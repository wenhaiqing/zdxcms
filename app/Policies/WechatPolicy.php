<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Wechat;

class WechatPolicy extends Policy
{
    public function view(User $user, Wechat $wechat)
    {
        return $user->can("manage_wechats");
    }

    public function create(User $user, Wechat $wechat)
    {
        return $user->can("create_wechats");
    }

    public function update(User $user, Wechat $wechat)
    {
        return $user->can("edit_wechats");
    }

    public function delete(User $user, Wechat $wechat)
    {
        return $user->can("destory_wechats");
    }
}
