<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DangMoney;

class DangMoneyPolicy extends Policy
{
    public function update(User $user, DangMoney $dang_money)
    {
        // return $dang_money->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, DangMoney $dang_money)
    {
        return true;
    }
}
