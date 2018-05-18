@extends(getThemeView('layouts.main'))
@php
    $meeting_picture = is_json($meeting->meeting_picture) ? json_decode($meeting->meeting_picture) : new \stdClass();
@endphp

@section('content')

    <form class="layui-form layui-form-pane" method="POST"
          action="{{ $meeting->id ? route('meetings.update', $meeting->id) : route('meetings.store') }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" class="mini-hidden" value="{{ $meeting->id ? 'PATCH' : 'POST' }}">
        <input type="hidden" name="user_id" value="{{$meeting->id ? $meeting->user_id : Auth()->id()}}">
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
        <div class="layui-upload" id="aetherupload-wrapper">

            <div class="controls" >
                <button type="button" class="layui-btn" id="test3"><input type="file" id="file"  onchange="aetherupload(this,'file').success(someCallback).upload()"/>
                    <i class="layui-icon"></i>{{trans('meetings.upload_file')}}
                </button><!--需要有一个名为file的id，用以标识上传的文件，aetherupload(file,group)中第二个参数为分组名，success方法可用于声名上传成功后的回调方法名-->
                <div class="progress " style="height: 6px;margin-bottom: 2px;margin-top: 10px;width: 200px;">
                    <div id="progressbar" style="background:blue;height:6px;width:0;"></div><!--需要有一个名为progressbar的id，用以标识进度条-->
                </div>
                <span style="font-size:12px;color:#aaa;" id="output"></span><!--需要有一个名为output的id，用以标识提示信息-->
                <input type="hidden" name="meeting_record" id="savedpath" value="{{$meeting->meeting_record}}"><!--需要有一个名为savedpath的id，用以标识文件保存路径的表单字段，还需要一个任意名称的name-->
                @if($meeting->id)
                    {{--<label class="layui-form-label">{{trans('meetings.meeting_record')}}</label>--}}
                    <div class="layui-input-inline">
                       <span>上次上传的会议记录：</span> {{$meeting->meeting_record}}  <e>(如果重新上传将会覆盖本记录以最新的为准)</e><br/>
                    </div>
                @endif
            </div>
        </div>

        <div class="layui-upload">
            {{--@if(!$meeting->id)--}}
            <button type="button" class="layui-btn" id="test2">多图片上传</button>
            {{--@endif--}}
            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                会议现场照片：
                <div class="layui-upload-list" id="demo2">
                    @if(get_json_params($meeting->meeting_picture,'0'))
                        @foreach($meeting_picture as $index=>$v)
                            <img src="{{$v}}" class="layui-upload-img"
                                 style="width: 92px;height: 92px;margin: 0 10px 10px 0;"/>
                            <input type="hidden" name="meeting_picture[]" value="{{$v}}">
                        @endforeach
                    @endif
                </div>
            </blockquote>
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
                , url: '{{ route('upload_image') }}'
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
    <script>
        // success(callback)中声名的回调方法需在此定义，参数callback可为任意名称，此方法将会在上传完成后被调用
        // 可使用this对象获得fileName,fileSize,uploadBaseName,uploadExt,subDir,group,savedPath等属性的值
        someCallback = function(){
            // Example
            $('#result').append(
                '<p>执行回调 - 文件原名：<span >'+this.fileName+'</span> | 文件大小：<span >'+parseFloat(this.fileSize / (1000 * 1000)).toFixed(2) + 'MB'+'</span> | 文件储存名：<span >'+this.savedPath.substr(this.savedPath.lastIndexOf('/') + 1)+'</span></p>'
            );
        }

    </script>
@stop