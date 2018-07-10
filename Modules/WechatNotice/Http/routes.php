<?php

Route::group(['middleware' => 'web', 'prefix' => 'wechatnotice', 'namespace' => 'Modules\WechatNotice\Http\Controllers'], function()
{
    Route::get('/', 'WechatNoticeController@index');
});
