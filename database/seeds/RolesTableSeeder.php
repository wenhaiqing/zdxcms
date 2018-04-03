<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 重置角色和权限的缓存
        app()['cache']->forget('spatie.permission.cache');
        $admin = Role::create([
            'name' => "Administrator",
            'remarks' => "超级管理员",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        $admin->givePermissionTo('manage_system');
        $admin->givePermissionTo('manage_users');
        $admin->givePermissionTo('manage_roles');
        $admin->givePermissionTo('manage_permission');

        $member = Role::create([
            'name' => "member",
            'remarks' => "普通会员",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

    }
}
