<?php

namespace App\Models\Traits;

use App\Models\Browselog;
use Predis;
use Carbon\Carbon;
use Log;

trait EveryAction
{
    // 缓存相关
    protected $hash_prefix = 'zdx:zdx_every_action_is_';
    protected $field_prefix = 'member_';

    public function RecordEveryAction($model, $modelid = null, $modeltitle = null,$action='查看了',$jifen=0)
    {
        // 获取今天的日期
        $date = Carbon::now()->toDateString();
        // Redis 哈希表的命名，如：zdx:zdx_every_action_is_20xx-xx-xx
        $hash = $this->hash_prefix . $date;
        // 字段名称，如：member_id_model_modelid
        $field = $this->field_prefix . $this->id . '_' . $model . '_' . $modelid;
        // 当前时间，如：20xx-xx-xx 08:35:15
        $res = Predis::hGet($hash,$field);
        if (!$res){
            $this->increment('jifen',$jifen);
        }else{
            $jifen = 0;
        }
        $now = Carbon::now()->toDateTimeString();
        $res = [
            'member_id' => $this->id,
            'member_name' => $this->name,
            'model_name' =>$model,
            'model_id'=>$modelid,
            'model_title' => $modeltitle,
            'log'=>$this->name.' '.$action.' '.$modeltitle,
            'jifen'=>$jifen,
            'created_at' => $now
        ];
        // 数据写入 Redis ，字段已存在会被更新
        Predis::hSet($hash, $field, json_encode($res));
    }

    public function SyncUserEveryAction()
    {
        // 获取昨天的日期，格式如：20xx-xx-xx
        $yesterday_date = Carbon::yesterday()->toDateString();
        //$date = Carbon::now()->toDateString();

        // Redis 哈希表的命名，如：larabbs_last_actived_at_2017-10-21
        $hash = $this->hash_prefix . $yesterday_date;

        // 从 Redis 中获取所有哈希表里的数据
        $dates = Predis::hGetAll($hash);

        // 遍历，并同步到数据库中
        foreach ($dates as $user_id => $action) {
            //将$action从json转换成数组
            $action = json_decode($action);
            // 把用户的行为记录插入到数据库中
            Browselog::create([
                'member_id' => $action->member_id,
                'member_name' => $action->member_name,
                'model_name' =>$action->model_name,
                'model_id'=>$action->model_id,
                'model_title' => $action->model_title,
                'log'=>$action->log,
                'jifen'=>$action->jifen,
                'action_time' => $action->created_at
            ]);
        }

        // 以数据库为中心的存储，既已同步，即可删除
        Predis::del($hash);
        
    }

    public function get_today_jifen()
    {
        $today_date = Carbon::now()->toDateString();
        // Redis 哈希表的命名，如：larabbs_last_actived_at_2017-10-21
        $hash = $this->hash_prefix .$today_date;
        // 从 Redis 中获取所有哈希表里的数据
        $dates = Predis::hGetAll($hash);
        $today_jifen = 0;
        // 遍历，并同步到数据库中
        foreach ($dates as $user_id => $action) {
            //将$action从json转换成数组
            $action = json_decode($action);
            if ($action->member_id == \Auth::guard('wap')->id()){
                $today_jifen +=$action->jifen;
            }
        }
        return $today_jifen;
    }

    public function today_myjifen()
    {
        $today_date = Carbon::now()->toDateString();
        // Redis 哈希表的命名，如：larabbs_last_actived_at_2017-10-21
        $hash = $this->hash_prefix .$today_date;
        // 从 Redis 中获取所有哈希表里的数据
        $dates = Predis::hGetAll($hash);
        $list = array();
        // 遍历，并同步到数据库中
        foreach ($dates as $user_id => $action) {
            //将$action从json转换成数组
            $action = json_decode($action);
            if ($action->member_id == \Auth::guard('wap')->id() && $action->jifen >0){
                $list[] = $action;
            }
        }
        return $list;
    }

}