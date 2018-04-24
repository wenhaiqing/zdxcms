<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Topic;

class TopicPolicy extends Policy
{
    public function update(User $user, Topic $topic)
    {
        // return $reply->user_id == $user->id;
        return $user->can("edit_topics");
    }

    public function destroy(User $user, Topic $topic)
    {
        return $user->can("destory_topics");
    }
}
