<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Reply;

class ReplyPolicy extends Policy
{
    public function update(User $user, Reply $reply)
    {
        // return $reply->user_id == $user->id;
        return $user->can("edit_replies");
    }

    public function destroy(User $user, Reply $reply)
    {
        return $user->can("destroy_replies");
    }
}
