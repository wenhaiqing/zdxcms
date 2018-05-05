<?php

namespace App\Models;

class Meeting extends Model
{
    protected $fillable = ['user_id','if_all', 'meeting_title', 'meeting_compere', 'meeting_address', 'meeting_starttime', 'meeting_endtime', 'meeting_membercount', 'meeting_picture', 'meeting_record', 'jifen'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
