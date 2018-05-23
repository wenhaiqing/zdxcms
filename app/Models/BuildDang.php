<?php

namespace App\Models;

class BuildDang extends Model
{
    public $table = 'build_dang';
    protected $fillable = ['title', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
