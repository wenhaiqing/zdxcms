<?php

namespace App\Models;

class Topic extends Model
{
    public $table = 'topic';
    protected $fillable = ['title', 'content', 'member_id', 'status', 'if_cream','image','view_count','reply_count','order','excerpt'];
    public function member()
    {
        return $this->belongsTo(Member::class)->withDefault();
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
