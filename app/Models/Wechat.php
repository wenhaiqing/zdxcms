<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wechat extends Model
{
    public $table = 'wechat';
    protected $fillable = ['type', 'object_id', 'name', 'account', 'app_id', 'app_secret', 'url', 'token', 'qrcode', 'primary', 'certified'];

}
