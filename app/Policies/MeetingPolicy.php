<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Meeting;

class MeetingPolicy extends Policy
{
    public function update(User $user, Meeting $meeting)
    {
        // return $meeting->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Meeting $meeting)
    {
        return true;
    }
}
