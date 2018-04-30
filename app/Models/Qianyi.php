<?php

namespace App\Models;

class Qianyi extends Model
{

    protected $fillable = ['name', 'member_id', 'from_user_id', 'to_user_id', 'status','from_user_name','to_user_name','linshi_to_user_id','linshi_to_user_name'];


    public function user()
    {
        return $this->belongsTo(User::class,'from_user_id');
    }

    public function touser()
    {
        return $this->belongsTo(User::class,'to_user_id');
    }
}
