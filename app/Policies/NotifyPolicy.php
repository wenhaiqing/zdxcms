<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Notify;

class NotifyPolicy extends Policy
{
    public function update(User $user, Notify $notify)
    {
        return $user->can("edit_notify");
        //return true;
    }

    public function destroy(User $user, Notify $notify)
    {
        return $user->can("destory_notify");
    }
}
