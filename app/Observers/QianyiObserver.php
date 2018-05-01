<?php

namespace App\Observers;

use App\Jobs\SendEmail;
use App\Models\Qianyi;
use App\Notifications\MemberQianyi;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class QianyiObserver
{

    public function created(Qianyi $qianyi)
    {
        // 通知作者话题被回复了
        $qianyi->user->notify(new MemberQianyi($qianyi));
        $title = $qianyi->name.'提出了迁党申请,请前往迁党管理中处理';
        $to = $qianyi->user->email;
        dispatch(new SendEmail($title,$to));
    }

    public function creating(Qianyi $qianyi)
    {
        //
    }

    public function updating(Qianyi $qianyi)
    {
        //
    }
}