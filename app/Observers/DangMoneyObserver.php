<?php

namespace App\Observers;

use App\Models\DangMoney;
use App\Models\Member;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class DangMoneyObserver
{
    public function creating(DangMoney $dang_money)
    {
        //
    }

    public function updating(DangMoney $dang_money)
    {
        //
    }

    public function saving(DangMoney $dang_money)
    {
        $member_id = $dang_money->member_id;
        $member= Member::where('id',$member_id)->first(['name']);
        $dang_money->name = $member->name;
    }
}