<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Notify;

class NotifyPolicy extends Policy
{
    public function update(User $user, Notify $notify)
    {
         return $notify->user_id == $user->id;
        //return true;
    }

    public function destroy(User $user, Notify $notify)
    {
        return $notify->user_id == $user->id;
    }
}
