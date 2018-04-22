<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ThemeDang;

class ThemeDangPolicy extends Policy
{
    public function update(User $user, ThemeDang $theme_dang)
    {
         return $user->can("edit_theme_dang");
        //return true;
    }

    public function destroy(User $user, ThemeDang $theme_dang)
    {
        return $user->can("destory_theme_dang");
    }
}
