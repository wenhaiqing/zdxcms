<?php

namespace App\Services\Admin;

use Spatie\Permission\Models\Permission;

/**
 * Class PermissionService
 *
 * @package \App\Services\Admin
 */
class PermissionService
{

    public function getRules(Permission $permission)
    {
        $rules = $permission
            ->orderBy('sort', 'asc')
            ->get()->toArray();
        return $this->tree($rules);
    }


    public function tree($data , $lefthtml = '|— ' , $pid=0 , $lvl=0)
    {
        $arr = [];
        foreach ($data as $k => $v) {
            if ($v['pid'] == $pid) {
                $v['ltitle'] = str_repeat($lefthtml, $lvl) . $v['remarks'];
                $arr[] = $v;
                unset($data[$k]);
                $arr = array_merge($arr, $this->tree($data, $lefthtml, $v['id'], $lvl + 1));
            }
        }

        return $arr;
    }
}