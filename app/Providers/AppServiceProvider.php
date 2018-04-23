<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\Reply::observe(\App\Observers\ReplyObserver::class);
		\App\Models\Member::observe(\App\Observers\MemberObserver::class);
		\App\Models\Video::observe(\App\Observers\VideoObserver::class);
		\App\Models\ThemeDang::observe(\App\Observers\ThemeDangObserver::class);
		\App\Models\Notify::observe(\App\Observers\NotifyObserver::class);

        /**
         * 视图composer共享数据
         */
        view()->composer(
            getThemeView('layouts.app'), 'App\Http\ViewComposers\MenuComposer'
        );

        \App\Models\Wechat::observe(\App\Observers\WechatObserver::class);
        \App\Models\WechatMenu::observe(\App\Observers\WechatMenuObserver::class);
        \App\Models\WechatResponse::observe(\App\Observers\WechatResponseObserver::class);
        \App\Models\Topic::observe(\App\Observers\TopicObserver::class);
        \Spatie\Permission\Models\Permission::observe(\App\Observers\PermissionsObserver::class);

        Validator::extend('identitycards', function($attribute, $value, $parameters) {
            return preg_match('/(^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$)|(^[1-9]\d{5}\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}$)/', $value);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
