<?php

namespace App\Observers;

use App\Models\Reply;
use App\Jobs\EveryAction;
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

    public function created(Reply $reply)
    {
        $member = \Auth::guard('wap')->user();
        $model = 'replies';
        $modelid = $reply->id;
        $modeltitle = $reply->topic->title;
        dispatch(new EveryAction($model,$member,$modelid,$modeltitle,'回复了话题'));

    }

    public function deleted(Reply $reply)
    {
        $reply->topic->decrement('reply_count', 1);
    }
}