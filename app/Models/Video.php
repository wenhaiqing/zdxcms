<?php

namespace App\Models;

class Video extends Model
{
    protected $fillable = ['title', 'description', 'cover', 'user_id', 'view_count', 'sort', 'if_cream','url','jifen','cid'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
