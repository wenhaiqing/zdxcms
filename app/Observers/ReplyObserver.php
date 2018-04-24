<?php

namespace App\Observers;

use App\Models\Reply;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplyObserver
{
    public function creating(Reply $reply)
    {
        $reply->topic->increment('reply_count', 1);
        $reply->member_id=\Auth::guard('wap')->id();
        $reply->content = clean($reply->content, 'user_topic_body');
    }

    public function updating(Reply $reply)
    {
        //
    }

    public function deleted(Reply $reply)
    {
        $reply->topic->decrement('reply_count', 1);
    }
}