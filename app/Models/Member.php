<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
class Member extends User
{
    use Traits\EveryAction;
    use Traits\RecordThemedDang;
    use Traits\RecordActiveUser;

    protected $fillable = ['birthday','user_id','openid', 'mobile', 'name', 'password', 'sex', 'nation', 'cardnum', 'record', 'age', 'if_dang', 'if_movedang', 'status', 'remember_token','jifen'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topic()
    {
        return $this->hasMany(Topic::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
