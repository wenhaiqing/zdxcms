<?php

namespace App\Models\Traits;

use Redis;
use Carbon\Carbon;
use Log;

trait EveryAction
{
    // 缓存相关
    protected $hash_prefix = 'zdx_every_action_is_';
    protected $field_prefix = 'member_';

    public function RecordEveryAction($action)
    {
        Log::info($action);
        // 获取今天的日期
        $date = Carbon::now()->toDateString();
        Log::info($date);
        // Redis 哈希表的命名，如：zdx_every_action_is_20xx-xx-xx
        $hash = $this->hash_prefix . $date;
        Log::info($hash);
        // 字段名称，如：member_1
        $field = $this->field_prefix . $this->id;
        Log::info($field);
        // 当前时间，如：2017-10-21 08:35:15
        $now = Carbon::now()->toDateTimeString();
        Log::info($now);
        // 数据写入 Redis ，字段已存在会被更新
        Redis::hSet($hash, $field, $now);
    }

}