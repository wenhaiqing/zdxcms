<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Wechat;
use Illuminate\Http\Request;
use Log;
use EasyWeChat\Factory;
use App\Models\WechatResponse;
class WeChatController extends Controller
{
    
    protected $config;

    public function __construct()
    {

    }
    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve(Request $request)
    {
        $wechat = Wechat::where('object_id',$request->wechat)->first();
        $config = [
            'app_id'  => $wechat->app_id,      // AppID
            'secret'  => $wechat->app_secret,      // AppSecret
            'token'   => $wechat->token,       // Token
            'aes_key' => 'UgakHzZPPOAa0OLQuZGHRwLpK536oNtOOQLvykKKZis',     // EncodingAESKey，兼容与安全模式下请一定要填写！！！
            'log' => [
                'level' => 'debug',
                'file' => storage_path('logs/wechat.log'),  //这个必须要有，要不调试有问题，你都会找不到原因
            ],
        ];
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志
        //$app = app('wechat.official_account');
        $app = Factory::officialAccount($config);


        $app->server->push(function($message){
            switch ($message['MsgType']) {
                case 'event':
                    return '收到事件消息';
                    break;
                case 'text':
                    return $this->getkeyword($message);
                    break;
                case 'image':
                    return $this->getkeyword($message);
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return $this->getkeyword($message);
                    break;
                // ... 其它消息
                default:
                    return '欢迎关注';
                    break;
            }
        });

        return $app->server->serve();
    }

    public function getkeyword($message)
    {
        Log::info($message);
        switch ($message['MsgType']) {
            case 'text':
                $wechat_response = WechatResponse::where('key',$message['Content'])->first();
                break;
            case 'link':
                $wechat_response = WechatResponse::where('key',$message['Url'])->first();
                break;
            case 'image':
                $wechat_response = WechatResponse::where('key',$message['MediaId '])->first();
                break;
        }

        if (!$wechat_response){
            $wechat_response = WechatResponse::where('type',$message['MsgType'])->where('key','default')->first();
        }
        if (!$wechat_response){
            return '欢迎各位积极应用各功能、提宝贵意见、为推进吕梁经济社会全面发展努力贡献自己的力量！';
        }
        $content = is_json($wechat_response->content) ? json_decode($wechat_response->content) : new \stdClass();
        $text = $content->text ?? '欢迎各位积极应用各功能、提宝贵意见、为推进吕梁经济社会全面发展努力贡献自己的力量！';
        return $text;
    }

    public function get_userinfo(Request $request)
    {
        $wechat = Wechat::where('id',2)->first();
        $config = [
                'app_id'  => $wechat->app_id,      // AppID
                'secret'  => $wechat->app_secret,      // AppSecret
                'token'   => $wechat->token,       // Token
                'aes_key' => 'UgakHzZPPOAa0OLQuZGHRwLpK536oNtOOQLvykKKZis',     // EncodingAESKey，兼容与安全模式下请一定要填写！！！
                'log' => [
                    'level' => 'debug',
                    'file' => storage_path('logs/wechat.log'),  //这个必须要有，要不调试有问题，你都会找不到原因
                ],
            'oauth' => [
                'scopes'   => ['snsapi_userinfo'],
                'callback' => '/profile',
            ],
            // ..
        ];

        $app = Factory::officialAccount($config);
        $oauth = $app->oauth;
        // 未登录
        if (!$request->session()->has('wechat_user')) {

            $request->session()->put('target_url', '/wap/bind_wechat');
            return $oauth->redirect();
            // 这里不一定是return，如果你的框架action不是返回内容的话你就得使用
            // $oauth->redirect()->send();
        }
// 已经登录过
       // $user = $_SESSION['wechat_user'];

    }

    public function profile(Request $request)
    {
        $wechat = Wechat::where('id',2)->first();
        $config = [
            'app_id'  => $wechat->app_id,      // AppID
            'secret'  => $wechat->app_secret,      // AppSecret
            'token'   => $wechat->token,       // Token
            'aes_key' => 'UgakHzZPPOAa0OLQuZGHRwLpK536oNtOOQLvykKKZis',     // EncodingAESKey，兼容与安全模式下请一定要填写！！！
            'log' => [
                'level' => 'debug',
                'file' => storage_path('logs/wechat.log'),  //这个必须要有，要不调试有问题，你都会找不到原因
            ],
            'oauth' => [
                'scopes'   => ['snsapi_userinfo'],
                'callback' => '/profile',
            ],
            // ..
        ];
        $app = Factory::officialAccount($config);
        $oauth = $app->oauth;

        // 获取 OAuth 授权结果用户信息
        $user = $oauth->user();

        //$_SESSION['wechat_user'] = $user->toArray();
        $request->session()->put('wechat_user', $user->toArray());
        //dd($_SESSION['wechat_user']);
        $targetUrl = $request->session()->get('target_url', '/wap/bind_wechat');
        header('location:'. $targetUrl); // 跳转到 user/profile
        
    }

    public function bind(Request $request)
    {
        if (!$request->session()->has('wechat_user')){
            return redirect()->route('wap.getuser');
        }
        $user = $request->session()->get('wechat_user');
        $openid = $user['id'];
        Member::where('openid',$openid)->update(['openid'=>'']);
        $member = Member::where('id',\Auth::guard('wap')->id())->update(['openid'=>$openid]);

        if ($member){
            flash('微信绑定成功');
            return redirect()->route('wap.center');
        }
        flash('微信绑定失败');
        return redirect()->route('wap.center');
    }
}
