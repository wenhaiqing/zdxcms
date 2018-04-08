<?php

/**
 * 主题下视图文件路径
 */
if (!function_exists('getThemeView')) {
    function getThemeView($view)
    {
        return 'admin.' . getTheme() . '.' . $view;
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
        return $vendors ? 'vendors/' . $asset : 'admin/' . getTheme() . '/' . $asset;
    }
}

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

/**
 * 生成 object_id
 */
function create_object_id(){
    return base_convert(uniqid(), 16, 10);
}

/**
 * 获取 json 参数
 * @param $content
 * @param $key
 * @param string $default
 * @return mixed|string
 */
function get_json_params($content,$key, $default = ''){
    return get_block_params(...func_get_args());
}

/**
 * 获取 block 参数
 *
 * @param $content
 * @param $key
 * @param string $default
 * @return mixed|string
 */
function get_block_params($content,$key, $default = ''){
    $content = is_json($content) ? json_decode($content) : new \stdClass();
    return get_value($content, $key, $default);
}

function is_json($string)
{
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}

/**
 * 获取对象/数组值
 *
 * @param $arr_or_obj
 * @param $key_or_prop
 * @param string $else
 * @return mixed|string
 */
function get_value($arr_or_obj, $key_or_prop, $else = ''){
    $result = $else;
    if(isset($arr_or_obj)){
        if(is_array($arr_or_obj)){
            if(isset($arr_or_obj[$key_or_prop])) {
                $result = $arr_or_obj[$key_or_prop];
            }
        }else if(is_object($arr_or_obj)){
            if (isset($arr_or_obj->$key_or_prop)) {
                $result = $arr_or_obj->$key_or_prop;
            }
        }
    }

    return $result;
}