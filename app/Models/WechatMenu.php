<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WechatMenu extends Model
{
    public $table = 'wechat_menu';
    protected $fillable = ['group', 'parent', 'name', 'type', 'data', 'order'];
}
