<?php

namespace App\Http\Controllers;

use App\Models\Wechat;
use Illuminate\Http\Request;
use Log;
use EasyWeChat\Factory;
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
            return "欢迎关注";
        });

        return $app->server->serve();
    }
}
