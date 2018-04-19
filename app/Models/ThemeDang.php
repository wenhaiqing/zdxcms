<?php

namespace App\Models;

class ThemeDang extends Model
{
    public $table = 'theme_dangs';
    protected $fillable = ['title', 'descript', 'content', 'user_id', 'status', 'if_cream','jifen'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
