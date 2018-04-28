<?php

namespace App\Models;


class MeetingSign extends Model
{

    public $table = 'meeting_sign';
    protected $fillable = ['member_id','meeting_id', 'sign_picture', 'sign_title', 'jifen'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }
}
