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
        /**
         * 视图composer共享数据
         */
        view()->composer(
            getThemeView('layouts.app'), 'App\Http\ViewComposers\MenuComposer'
        );

        \App\Models\Wechat::observe(\App\Observers\WechatObserver::class);
        \App\Models\WechatMenu::observe(\App\Observers\WechatMenuObserver::class);
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
