<?php

namespace App\Observers;

use App\Models\Meeting;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class MeetingObserver
{
    public function creating(Meeting $meeting)
    {
        $meeting_record = $meeting->meeting_record;
        if (stripos($meeting_record,"http://")!== false){

        }else{
            $meeting_record = str_replace("\\","/",$meeting_record);
            $meeting->meeting_record = 'http://'.$_SERVER['HTTP_HOST'].'/uploads/videos/'.$meeting_record;
        }
        if(is_array($meeting->meeting_picture) || is_object($meeting->meeting_picture)){
            $meeting->meeting_picture = json_encode($meeting->meeting_picture, JSON_UNESCAPED_UNICODE);
        }
        $meeting->meeting_membercount=0;
    }

    public function updating(Meeting $meeting)
    {
        $meeting_record = $meeting->meeting_record;
        if (stripos($meeting_record,"http://")!== false){

        }else{
            $meeting_record = str_replace("\\","/",$meeting_record);
            $meeting->meeting_record = 'http://'.$_SERVER['HTTP_HOST'].'/uploads/videos/'.$meeting_record;
        }
        if(is_array($meeting->meeting_picture) || is_object($meeting->meeting_picture)){
            $meeting->meeting_picture = json_encode($meeting->meeting_picture, JSON_UNESCAPED_UNICODE);
        }
    }
}