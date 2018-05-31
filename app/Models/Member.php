<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
class Member extends User
{
    use Traits\EveryAction;
    use Traits\RecordThemedDang;
    use Traits\RecordActiveUser;

    protected $fillable = ['birthday','dang_age','joindang_time','user_id','openid', 'mobile', 'name', 'password', 'sex', 'nation', 'cardnum', 'record', 'age', 'if_dang', 'if_movedang', 'status', 'remember_token','jifen'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function topic()
    {
        return $this->hasMany(Topic::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function getpid($pid)
    {
        if ($pid ==0){
            $pid =1;
        }
        $user = \App\Models\User::where('id',$pid)->first();
        return $user->name;
    }
    public function setPasswordAttribute($value)
    {
        // 如果值的长度等于 60，即认为是已经做过加密的情况
        if (strlen($value) != 60) {

            // 不等于 60，做密码加密处理
            $value = bcrypt($value);
        }

        $this->attributes['password'] = $value;
    }
}
