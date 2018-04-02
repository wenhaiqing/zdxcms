<?php

namespace App\Presenters\Admin;

class MenuPresenter
{
    public function sidebarMenuList($menu)
    {
        $html = '';
        if ($menu){
            foreach ($menu as $v){
                if ($v['child']){
                    $html .= <<<Eof
                    <li class="layui-nav-item">
                        <a class="" href="javascript:;">{$v['remarks']}</a>
                        {$this->childMenu($v['child'])}
                    </li>
Eof;
                }else{
                    $html .= <<<Eof
                    <li class="layui-nav-item">
                        <a class="zdx-tab-add" zdx-href="{$v['url']}">{$v['remarks']}</a>
                    </li>
Eof;
                }
            }
        }
        return $html;
    }

    /**
     * 多级菜单显示
     * @author wenhaiqing
     * @date   2018-03-31
     * @param  [type]     $childMenu [description]
     * @return [type]                [description]
     */
    public function childMenu($childMenu)
    {
        $html = '';
        if ($childMenu) {
            foreach ($childMenu as $v) {
                if ($v['status'] == 1){
                    $html .= <<<Eof
                    <dl class="layui-nav-child">
                        <dd>
                            <a class="zdx-tab-add" zdx-href="{$v['url']}" href="javascript:;">{$v['remarks']}</a>
                        </dd>
                    </dl>
Eof;
                }
            }
        }
        return $html;
    }
}