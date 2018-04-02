<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class Policy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function before($user, $ability)
    {
        // 如果用户是超级管理员的话，即授权通过
        if ($user->hasRole('Administrator')) {
            return true;
        }
    }
}
