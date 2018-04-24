<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Qianyi;

class QianyiPolicy extends Policy
{
    public function update(User $user, Qianyi $qianyi)
    {
        // return $qianyi->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Qianyi $qianyi)
    {
        return true;
    }
}
