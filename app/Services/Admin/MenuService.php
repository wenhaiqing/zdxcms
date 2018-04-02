<?php
namespace App\Services\Admin;

use Spatie\Permission\Models\Permission;
use Auth;
class MenuService {
	
	protected $permission;

    /**
     * 排序子菜单并缓存
     * @author wenhaiqing
     * @date   2018-03-31
     * @return [type]     [description]
     */
    public function sortMenuSetCache()
    {
        $user = Auth::user();
        $menus = $user->getAllPermissions()->toArray();
        if ($menus) {
            $menuList = $this->sortMenu($menus);
            foreach ($menuList as $key => &$v) {
                if ($v['child']) {
                    $sort = array_column($v['child'], 'sort');
                    array_multisort($sort,SORT_DESC,$v['child']);
                }
            }
            return $menuList;

        }
        return '';
    }

    /**
     * 递归菜单数据
     * @author wenhaiqing
     * @date   2018-03-31
     * @param  [type]     $menus [description]
     * @param  integer    $pid   [description]
     * @return [type]            [description]
     */
    public function sortMenu($menus,$pid=0)
    {
        $arr = [];
        if (empty($menus)) {
            return '';
        }
        foreach ($menus as $key => $v) {
            if ($v['pid'] == $pid) {
                $arr[$key] = $v;
                $arr[$key]['child'] = self::sortMenu($menus,$v['id']);
            }
        }
        return $arr;
    }
	
}