<?php

namespace App\Observers;

use App\Models\User;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class UserObserver
{
    public function creating(User $user)
    {
        if(is_array($user->users_picture) || is_object($user->users_picture)){
            $user->users_picture = json_encode($user->users_picture, JSON_UNESCAPED_UNICODE);
        }
    }

    public function updating(User $user)
    {
        if(is_array($user->users_picture) || is_object($user->users_picture)){
            $user->users_picture = json_encode($user->users_picture, JSON_UNESCAPED_UNICODE);
        }
    }
}