@extends(getThemeView('layouts.main'))
@php
    $meeting_picture = is_json($meeting->meeting_picture) ? json_decode($meeting->meeting_picture) : new \stdClass();
@endphp
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('editor/css/simditor.css') }}">
    <style>
        .layui-form-pane .yy {
            margin-left: 1px;
            left: -1px;
        }
    </style>
@endsection
@section('content')

    <form class="layui-form layui-form-pane" method="POST"
          action="{{ $meeting->id ? route('wap.admin_meeting_update', ['id'=>$meeting->id]) : route('wap.admin_meeting_store') }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" class="mini-hidden" value="{{ $meeting->id ? 'PATCH' : 'POST' }}">
        <input type="hidden" name="user_id" value="{{\Auth::guard('wap')->user()->if_admin}}">
        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('meetings.title')}}</label>
            <div class="layui-input-block">
                <input type="text" name="meeting_title" lay-verify="required" autocomplete="off" placeholder=""
                       class="layui-input" value="{{ old('meeting_title',$meeting->meeting_title) }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('meetings.compere')}}</label>
            <div class="layui-input-block">
                <input type="text" id="compere" name="meeting_compere" lay-verify="required" autocomplete="off"
                       placeholder=""
                       class="layui-input" value="{{ old('meeting_compere',$meeting->meeting_compere) }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('meetings.address')}}</label>
            <div class="layui-input-block">
                <input type="text" id="address" name="meeting_address" lay-verify="required" autocomplete="off"
                       placeholder=""
                       class="layui-input" value="{{ old('meeting_address',$meeting->meeting_address) }}">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">{{trans('meetings.starttime')}}</label>
                <div class="layui-input-inline">
                    <input type="text" id="meeting_starttime" name="meeting_starttime" autocomplete="off" class="layui-input"
                           value="{{old('meeting_starttime',$meeting->meeting_starttime)}}">
                </div>
            </div>

            <div class="layui-inline">
                <label class="layui-form-label">{{trans('meetings.endtime')}}</label>
                <div class="layui-input-inline">
                    <input type="text" id="meeting_endtime" name="meeting_endtime" autocomplete="off" class="layui-input"
                           value="{{old('meeting_endtime',$meeting->meeting_endtime)}}">
                </div>
            </div>
        </div>

        <div class="layui-form-item" pane="">
            <label class="layui-form-label">{{trans('meetings.if_all')}}</label>
            <div class="layui-input-block">
                <input type="radio" name="if_all" value="0" @if(old('if_all',$meeting->if_all) == 0) checked="" @endif title="{{trans('meetings.if_all_0')}}" lay-verify="required">
                <input type="radio" name="if_all" value="1" @if(old('if_all',$meeting->if_all) == 1) checked="" @endif title="{{trans('meetings.if_all_1')}}" lay-verify="required">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit="" lay-filter="demo1">{{trans('global.submit')}}</button>
                <button type="reset" class="layui-btn layui-btn-primary">{{trans('global.reset')}}</button>
            </div>
        </div>
    </form>
@endsection
@section('js')
    <script src="{{asset('js/spark-md5.min.js') }}"></script><!--需要引入spark-md5.min.js-->
    <script src="{{asset('layui/lib/jquery/jquery-2.1.4.js')}}"></script><!--需要引入jquery.min.js-->
    <script src="{{asset('js/aetherupload.js') }}"></script><!--需要引入aetherupload.js-->
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
                        var html = '';
//                        html += '<div class="aui-col-xs-4 image-item">';
                        html += '<img src="' + result + '" alt="' + file.name + '" class="notes-image" style="width: 92px;height: 92px;margin: 0 10px 10px 0;">';
//                        html += '</div>';
                        $('#demo2').append(html)
                    });
                }
                , done: function (res) {
                    console.log(res.file_path);
                    $('#demo2').append('<input value="' + res.file_path + '" type="hidden" name="meeting_picture[]">');
                    //上传完毕
                }
            });
        });

        layui.laydate.render({
            elem: '#meeting_starttime',
            type: 'datetime'
        });

        layui.laydate.render({
            elem: '#meeting_endtime',
            type: 'datetime'
        });
    </script>
@stop