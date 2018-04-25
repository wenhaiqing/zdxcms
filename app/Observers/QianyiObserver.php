<?php

namespace App\Observers;

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