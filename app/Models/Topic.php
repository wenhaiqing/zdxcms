<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public $table = 'topic';
    protected $fillable = ['title', 'content', 'member_id', 'status', 'if_cream','image','view_count','reply_count','order','excerpt'];
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
