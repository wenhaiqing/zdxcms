<?php

namespace App\Observers;

use App\Models\MeetingSign;
use App\Jobs\EveryAction;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class MeetingSignObserver
{

    public function saving(MeetingSign $meetingsign){
        if(is_array($meetingsign->sign_picture) || is_object($meetingsign->sign_picture)){
            $meetingsign->sign_picture = json_encode($meetingsign->sign_picture, JSON_UNESCAPED_UNICODE);
        }
        if (!$meetingsign->member_id){
            $meetingsign->member_id = \Auth::guard('wap')->id();
        }

    }

    public function created(MeetingSign $meetingsign)
    {
        $member = \Auth::guard('wap')->user();
        $model = 'meeting_sign';
        $modelid = $meetingsign->id;
        $modeltitle = $meetingsign->meeting->meeting_title;
        dispatch(new EveryAction($model,$member,$modelid,$modeltitle,'签到了(会议/课程)'));

    }


}