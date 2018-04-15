<?php

namespace App\Models;

class Notify extends Model
{
    public $table = 'notifies';
    protected $fillable = ['title', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
