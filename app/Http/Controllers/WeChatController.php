<?php

namespace App\Http\Controllers;

use App\Models\Wechat;
use Illuminate\Http\Request;
use Log;
use EasyWeChat\Factory;
use App\Models\WechatResponse;
class WeChatController extends Controller
{
    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve(Request $request)
    {
        $wechat = Wechat::where('object_id',$request->wechat)->first();
        \Log::info($wechat->app_id);
        \Log::info($wechat->app_secret);
        \Log::info($wechat->app_token);
        $config = [
            'app_id'  => $wechat->app_id,      // AppID
            'secret'  => $wechat->app_secret,      // AppSecret
            'token'   => $wechat->token,       // Token
            'aes_key' => '',     // EncodingAESKey，兼容与安全模式下请一定要填写！！！
            'log' => [
                'level' => 'debug',
                'file' => storage_path('logs/wechat.log'),  //这个必须要有，要不调试有问题，你都会找不到原因
            ],
        ];
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志
        //$app = app('wechat.official_account');
        $app = Factory::officialAccount($config);
        return $app->server->serve();

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
            return '小编无语了';
        }
        $content = is_json($wechat_response->content) ? json_decode($wechat_response->content) : new \stdClass();
        $text = $content->text ?? '小编不知道该怎么回你';
        return $text;
    }
}
