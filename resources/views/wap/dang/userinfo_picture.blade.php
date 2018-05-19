@extends('wap.layouts._header')

@php
    $users_picture = is_json($userinfo->users_picture) ? json_decode($userinfo->users_picture) : new \stdClass();
@endphp

@section('content')
    <header class="aui-bar aui-bar-nav" id="header">
        <div class="aui-pull-left aui-btn" tapmode onclick="window.history.go(-1);">
            <span class="aui-iconfont aui-icon-left"></span>
        </div>
        <div class="aui-title">支部掠影</div>
    </header>
    <form action="{{route('wap.userinfo_picture_add')}}" method="POST">
        {{ csrf_field() }}
    <div class="layui-upload">
        {{--@if(!$meeting->id)--}}
        <button type="button" class="layui-btn" id="test2">多图片上传</button>
        {{--@endif--}}
        <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
            党支部宣传照片：
            <div class="layui-upload-list" id="demo2">
                @if(get_json_params($userinfo->users_picture,'0'))
                    @foreach($users_picture as $index=>$v)
                        <div class="layui-inline">
                        <img src="{{$v}}" class="layui-upload-img"
                             style="width: 92px;height: 92px;margin: 0 10px 10px 0;"/>
                        <input type="hidden" name="users_picture[]" value="{{$v}}">
                        </div>
                    @endforeach
                @endif
            </div>
        </blockquote>
    </div>
   <button class="layui-btn layui-btn-fluid" type="submit">上传支部掠影</button>
    </form>


@stop

@section('js')
    <script>
        layui.use('upload', function () {
            var $ = layui.jquery
                , upload = layui.upload;
            //多图片上传
            upload.render({
                elem: '#test2'
                , url: '{{ route('wap.upload_image') }}'
                , data: {_token: '{{ csrf_token() }}'}
                , multiple: true
                , before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        layer.msg('图片上传中...', {
                            icon: 16,
                            shade: 0.01,
                            time: 0
                        });
                        var html = '';
                         html += '<div class="layui-inline">';
//
                        html += '<img src="' + result + '" alt="' + file.name + '" class="notes-image" style="width: 92px;height: 92px;margin: 0 10px 10px 0;">';
//
                        html += '</div>';
                        $('#demo2').append(html)
                    });
                }
                , done: function (res) {
                    layer.close(layer.msg());//关闭上传提示窗口
                    $('#demo2').append('<input value="' + res.file_path + '" type="hidden" name="users_picture[]">');
                    //上传完毕
                }
            });
        });
    </script>
@stop