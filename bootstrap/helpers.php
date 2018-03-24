<?php

/**
 * 主题下视图文件路径
 */
if (!function_exists('getThemeView')) {
    function getThemeView($view)
    {
        return 'themes.admin.' . getTheme() . '.' . $view;
    }
}
/**
 * 获取主题
 */
if (!function_exists('getTheme')) {
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
/**
 * 获取页面资源文件
 */
if (!function_exists('getThemeAssets')) {
    function getThemeAssets($asset, $vendors = false)
    {
        return $vendors ? 'vendors/' . $asset : 'themes/admin/' . getTheme() . '/' . $asset;
    }
}

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}