<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class WechatResponse extends Model
{
    public $table = 'wechat_response';
    protected $fillable = ['wechat_id', 'key', 'group', 'type', 'source', 'content'];
}
