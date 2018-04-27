<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Sign;

class SignPolicy extends Policy
{
    public function update(User $user, Sign $sign)
    {
        // return $sign->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Sign $sign)
    {
        return true;
    }
}
