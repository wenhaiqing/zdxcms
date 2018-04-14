<?php

namespace App\Models;

class Notify extends Model
{
    public $table = 'notifies';
    protected $fillable = ['title', 'content', 'user_id'];
}
