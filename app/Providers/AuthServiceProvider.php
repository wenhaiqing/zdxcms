<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
		 \App\Models\ThemeDang::class => \App\Policies\ThemeDangPolicy::class,
		 \App\Models\Notify::class => \App\Policies\NotifyPolicy::class,
        'App\Model' => 'App\Policies\ModelPolicy',
        \App\Models\User::class  => \App\Policies\UserPolicy::class,
        \App\Models\Wechat::class  => \App\Policies\WechatPolicy::class,
        \Spatie\Permission\Models\Role::class  => \App\Policies\RolePolicy::class,
        \Spatie\Permission\Models\Permission::class  => \App\Policies\PermissionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
