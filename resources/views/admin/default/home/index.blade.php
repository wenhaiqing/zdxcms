@extends('admin.default.layouts.app')

@section('frame')
<div class="layui-tab zdx-tab " style="" lay-filter="zdx-tab-filter" lay-allowclose="true">
    <ul class="layui-tab-title" style="">
        <li class="layui-this" lay-id="0">首页</li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <div class="row">
                <div>
                    <blockquote class="layui-elem-quote title">系统基本参数</blockquote>
                    <table class="layui-table">
                        <tbody>
                        <tr>
                            <td>网站域名</td>
                            <td class="host">{{$system_info['url']}}</td>
                        </tr>
                        <tr>
                            <td>网站ip</td>
                            <td class="ip">{{$system_info['server_ip']}}</td>
                        </tr>
                        <tr>
                            <td>web环境</td>
                            <td class="server">{{$system_info['server_soft']}}</td>
                        </tr>
                        <tr>
                            <td>PHP版本</td>
                            <td class="server">{{$system_info['php_version']}}</td>
                        </tr>
                        <tr>
                            <td>mysql版本</td>
                            <td class="dataBase">{{$system_info['mysql_version']}}</td>
                        </tr>
                        <tr>
                            <td>最大上传限制</td>
                            <td class="maxUpload">{{$system_info['max_upload_size']}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
    @endsection