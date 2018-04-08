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

        $app->server->push(function($message){
            switch ($message['MsgType']) {
                case 'event':
                    return '收到事件消息';
                    break;
                case 'text':
                    return $this->getkeyword($message);
                    break;
                case 'image':
                    return '收到图片消息';
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
                    return '收到链接消息';
                    break;
                // ... 其它消息
                default:
                    return '欢迎关注';
                    break;
            }
        });

        return $app->server->serve();
    }

    public function getkeyword()
    {
        //Log::info($message['Content'].'1');
        $wechat_response = WechatResponse::where('key','test')->first();
        Log::info(json_decode($wechat_response->content).'2');
        $content = is_json($wechat_response->content) ? json_decode($wechat_response->content) : new \stdClass();
        $text = $content->text ?? '小编不知道该怎么回你';
        Log::info($text);
        return $text;
    }
}
