<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        \Spatie\Permission\Models\Permission::observe(\App\Observers\PermissionsObserver::class);
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
