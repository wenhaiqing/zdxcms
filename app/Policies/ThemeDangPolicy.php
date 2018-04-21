<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ThemeDang;

class ThemeDangPolicy extends Policy
{
    public function update(User $user, ThemeDang $theme_dang)
    {
         return $theme_dang->user_id == $user->id;
        //return true;
    }

    public function destroy(User $user, ThemeDang $theme_dang)
    {
        return $theme_dang->user_id == $user->id;
    }
}
