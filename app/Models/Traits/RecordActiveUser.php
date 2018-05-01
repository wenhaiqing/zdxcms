<?php

namespace App\Models\Traits;


use App\Models\Member;
use App\Models\User;
use Cache;
use Log;

trait RecordActiveUser
{
    // 用于存放临时用户数据
    protected $users = [];

    // 配置信息
    protected $user_number = 15; // 取出来多少用户

    // 缓存相关配置
    protected $cache_key = 'zdxcms_active_users';
    protected $cache_expire_in_minutes = 1435;

    public function getActiveUsers()
    {
        // 尝试从缓存中取出 cache_key 对应的数据。如果能取到，便直接返回数据。
        // 否则运行匿名函数中的代码来取出活跃用户数据，返回的同时做了缓存。
        return Cache::remember($this->cache_key, $this->cache_expire_in_minutes, function(){
            return $this->record_active_user();
        });
    }
    public function record_active_user()
    {
        $users = User::where(['status'=>1])->where('pid','<>','0')->get()->toArray();
        foreach ($users as &$v){
            $v['sum_jifen'] = Member::where(['user_id'=>$v['id'],'status'=>1])->sum('jifen');
        }
        //把数组根据积分和进行排序
        $ages = array();
        foreach ($users as $user) {
            $ages[] = $user['sum_jifen'];
        }
        array_multisort($ages, SORT_DESC, $users);
        //只取排名前15个党组织
        $active_users = array_slice($users,0,config('wap.global.paginate'));

       return $active_users;
    }

    public function calculateAndCacheActiveUsers()
    {
        // 取得活跃用户列表
        $active_users = $this->record_active_user();
        // 并加以缓存
        $this->cacheActiveUsers($active_users);
        
    }

    public function cacheActiveUsers()
    {
        Cache::put($this->cache_key, $active_users, $this->cache_expire_in_minutes);
    }

}