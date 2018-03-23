<?php
/**
 * 主题下视图文件路径
 */
if(!function_exists('getThemeView')){
    function getThemeView($view)
    {
        return 'themes.'.getTheme().'.'.$view;
    }
}

/**
 * 获取主题
 */
if(!function_exists('getTheme')){
    function getTheme()
    {
        if (cache()->has('theme')) {
            return cache('theme');
        }
        $theme = config('admin.global.theme');
        cache()->forever('theme', $theme);
        return $theme;
    }
}