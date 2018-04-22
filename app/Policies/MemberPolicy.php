<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Member;

class MemberPolicy extends Policy
{
    public function update(User $user, Member $member)
    {
        // return $member->user_id == $user->id;
        return $user->can("edit_members");
    }

    public function destroy(User $user, Member $member)
    {
        return $user->can("destory_members");
    }
}
