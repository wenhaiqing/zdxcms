<?php

namespace App\Observers;

use App\Models\SuiRecord;
use App\Jobs\EveryAction;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class SuiRecordObserver
{

    public function saving(SuiRecord $suiRecord){
        if(is_array($suiRecord->record_picture) || is_object($suiRecord->record_picture)){
            $suiRecord->record_picture = json_encode($suiRecord->record_picture, JSON_UNESCAPED_UNICODE);
        }
        if (!$suiRecord->member_id){
            $suiRecord->member_id = \Auth::guard('wap')->id();
        }
    }

    public function created(SuiRecord $suiRecord)
    {
        $member = \Auth::guard('wap')->user();
        $model = 'sui_records';
        $modelid = $suiRecord->id;
        $modeltitle = $suiRecord->record_title;
        $jifen = config('wap.global.sui_records');
        dispatch(new EveryAction($model,$member,$modelid,$modeltitle,'随笔记录',$jifen));
    }


}