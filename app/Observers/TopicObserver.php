<?php

namespace App\Observers;

use App\Models\Topic;
use App\Jobs\EveryAction;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{

    public function saving(Topic $topic){
        if(is_array($topic->image) || is_object($topic->image)){
            $topic->image = json_encode($topic->image, JSON_UNESCAPED_UNICODE);
        }
        if (!$topic->member_id){
            $topic->member_id = \Auth::guard('wap')->id();
        }
        $topic->content = clean($topic->content, 'user_topic_body');
        $topic->excerpt = make_excerpt($topic->content);
    }

    public function created(Topic $topic)
    {
        $member = \Auth::guard('wap')->user();
        $model = 'topic';
        $modelid = $topic->id;
        $modeltitle = $topic->title;
        dispatch(new EveryAction($model,$member,$modelid,$modeltitle,'发布了'));

    }

    public function deleted(Topic $topic)
    {
        \DB::table('replies')->where('topic_id', $topic->id)->delete();
    }
}