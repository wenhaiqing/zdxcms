<?php

namespace App\Models;

class Video extends Model
{
    protected $fillable = ['title', 'description', 'cover', 'user_id', 'view_count', 'sort', 'if_cream','url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
