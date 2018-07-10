<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;

class HomeController extends BaseController
{
    public function index()
    {
        $mysqlVs = DB::select('SELECT VERSION() AS ver'); // mysql 版本

        $systemInfo = [
            'url'             => 'http://whqrlm.com',   // 域名
            'document_root'   => 'public', // 网站目录
            'server_os'       => PHP_OS,                    // 服务器系统
            'server_port'     => '5200',   // web服务端口号
            'server_ip'       => '127.0.0.1',   // 服务器ip
            'server_soft'     => 'centos 7', // web运行环境
            'php_version'     => PHP_VERSION,               // php版本
            'mysql_version'   => $mysqlVs[0]->ver,          // mysql版本
            'max_upload_size' => ini_get('upload_max_filesize') // 上传文件大小
        ];
    	return view(getThemeView('home.index'),['system_info' => $systemInfo,'aa'=>1]);
    }

    public function main()
    {
        return view(getThemeView('home.main'));
    }


}
