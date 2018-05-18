<?php

namespace App\Observers;

use App\Models\Member;
use Hash;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class MemberObserver
{
    public function creating(Member $member)
    {
        if ($member->cardnum) {
            $cardnum = substr($member->cardnum, 6, 4);
            $d = date('Y');
            $age = ($d - $cardnum + 1);
            if ($age > 100 || $age < 0) {
                $age = 0;
            }
            $member->age = $age;
            $member->birthday = substr($member->cardnum, 6, 4).'-'.substr($member->cardnum, 10, 2).'-'.substr($member->cardnum, 12, 2);
        }
    }

    public function updating(Member $member)
    {
        if ($member->cardnum) {
            $cardnum = substr($member->cardnum, 6, 4);
            $d = date('Y');
            $age = ($d - $cardnum + 1);
            if ($age > 100 || $age < 0) {
                $age = 0;
            }
            $member->age = $age;
            $member->birthday = substr($member->cardnum, 6, 4).'-'.substr($member->cardnum, 10, 2).'-'.substr($member->cardnum, 12, 2);
        }
    }

    public function deleted(Member $member)
    {
        \DB::table('topic')->where('member_id', $member->id)->delete();
    }

}