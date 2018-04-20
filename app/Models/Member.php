<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
class Member extends User
{
    use Traits\EveryAction;

    protected $fillable = ['birthday','user_id', 'mobile', 'name', 'password', 'sex', 'nation', 'cardnum', 'record', 'age', 'if_dang', 'if_movedang', 'status', 'remember_token'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
