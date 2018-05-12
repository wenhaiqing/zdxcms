@extends(getThemeView('layouts.main'))
@section('css')
    <style>
        .layui-upload-img{width: 92px; height: 92px; margin: 0 10px 10px 0;}
    </style>
    @stop
@section('content')

    <form class="layui-form layui-form-pane" method="POST" action="{{ $video->id ? route('videos.update', $video->id) : route('videos.store') }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" class="mini-hidden" value="{{ $video->id ? 'PATCH' : 'POST' }}">
        <input type="hidden" name="user_id" value="{{Auth()->id()}}">
        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('video.title')}}</label>
            <div class="layui-input-block">
                <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('title',$video->title) }}" >
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('video.description')}}</label>
            <div class="layui-input-block">
                <input type="text" name="description" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('description',$video->description) }}" >
            </div>
        </div>
        <div class="layui-form-item" pane="">
            <label class="layui-form-label">{{trans('permissions.pid')}}</label>
            <div class="layui-input-block">
                <select name="cid" lay-verify="" lay-search="">
                    <option value="0" @if(0 == $video->cid) selected @endif>{{trans('video.select_category')}}</option>
                    @foreach($category as $key => $val)
                        <option value="{{$val['id']}}" @if($val['id'] == $video->cid) selected @endif>{{$val['title']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="test1">{{trans('video.cover')}}</button>
            <div class="layui-upload-list">
                <img class="layui-upload-img" id="demo1" src="{{$video->cover}}">
                <p id="demoText"></p>
            </div>
            <input type="hidden" name="cover" id="cover" value="{{$video->cover}}">
        </div>
        <div class="layui-upload" id="aetherupload-wrapper">

            <div class="controls" >
                <button type="button" class="layui-btn" id="test3"><input type="file" id="file"  onchange="aetherupload(this,'file').success(someCallback).upload()"/>
                    <i class="layui-icon"></i>{{trans('global.upload_videos')}}
                </button><!--需要有一个名为file的id，用以标识上传的文件，aetherupload(file,group)中第二个参数为分组名，success方法可用于声名上传成功后的回调方法名-->
                <div class="progress " style="height: 6px;margin-bottom: 2px;margin-top: 10px;width: 200px;">
                    <div id="progressbar" style="background:blue;height:6px;width:0;"></div><!--需要有一个名为progressbar的id，用以标识进度条-->
                </div>
                <span style="font-size:12px;color:#aaa;" id="output"></span><!--需要有一个名为output的id，用以标识提示信息-->
                <input type="hidden" name="url" id="savedpath" value="{{$video->url}}"><!--需要有一个名为savedpath的id，用以标识文件保存路径的表单字段，还需要一个任意名称的name-->
            </div>
        </div>
        @can('jifen_videos')
            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('video.jifen')}}</label>
                <div class="layui-input-block">
                    <input type="number" name="jifen" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="0" >
                </div>
            </div>
        @endcan
        <div class="layui-form-item">
            {{--<div class="layui-input-block">--}}
            <button class="layui-btn" lay-submit="" lay-filter="demo1">{{trans('global.submit')}}</button>
            <button type="reset" class="layui-btn layui-btn-primary">{{trans('global.reset')}}</button>
            {{--</div>--}}
        </div>
    </form>
@endsection
@section('js')
    <script src="{{asset('js/spark-md5.min.js') }}"></script><!--需要引入spark-md5.min.js-->
    <script src="{{asset('layui/lib/jquery/jquery-2.1.4.js')}}"></script><!--需要引入jquery.min.js-->
    <script src="{{asset('js/aetherupload.js') }}"></script><!--需要引入aetherupload.js-->
    <script>
        layui.use('upload', function() {
            var $ = layui.jquery
                , upload = layui.upload;
            //普通图片上传
            var uploadInst = upload.render({
                elem: '#test1'
                ,url: '{{ route('upload_image') }}'
                ,data: { _token: '{{ csrf_token() }}'}
                ,before: function(obj){
                    //预读本地文件示例，不支持ie8
                    obj.preview(function(index, file, result){
                        $('#demo1').attr('src', result); //图片链接（base64）
                    });
                }
                ,done: function(res){
                    //如果上传失败
                    if(!res.success){
                        return layer.msg(res.msg);
                    }
                    $("#cover").attr('value',res.file_path);
                    //上传成功
                }
                ,error: function(){
                    //演示失败状态，并实现重传
                    var demoText = $('#demoText');
                    demoText.html('<span style="color: #FF5722;">{{trans('global.upload_error')}}</span> <a class="layui-btn layui-btn-mini demo-reload">{{trans('global.restart')}}</a>');
                    demoText.find('.demo-reload').on('click', function(){
                        uploadInst.upload();
                    });
                }
            });

        })
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