<?php

namespace App\Models;

class Reply extends Model
{
    protected $fillable = ['topic_id', 'member_id', 'content'];

    public function topic()
    {
        return $this->belongsTo(Topic::class)->withDefault();
    }

    public function member()
    {
        return $this->belongsTo(Member::class)->withDefault();
    }
}
