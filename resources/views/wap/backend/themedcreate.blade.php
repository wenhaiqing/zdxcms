@extends(getThemeView('layouts.main'))
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

    <form class="layui-form layui-form-pane" method="POST" action="{{ $theme_dang->id ? route('wap.admin_themed_update', ['id'=>$theme_dang->id]) : route('wap.admin_themed_store') }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" class="mini-hidden" value="{{ $theme_dang->id ? 'PATCH' : 'POST' }}">
        <input type="hidden" name="user_id" value="{{Auth()->guard('wap')->user()->if_admin}}">
        <div class="layui-form-item">
            <div class="layui-input-block yy">
                <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="请输入标题" class="layui-input" value="{{ old('title',$theme_dang->title) }}" >
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block yy">
                <input type="text" name="descript" lay-verify="required" autocomplete="off" placeholder="请输入描述" class="layui-input" value="{{ old('descript',$theme_dang->descript) }}" >
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block yy">
                <input type="text" id="editor" name="content" lay-verify="required" autocomplete="off" placeholder="请输入内容" class="layui-input" value="{{ old('content',$theme_dang->content) }}" >
            </div>
        </div>
        @can('jifen_theme_dang')
            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('theme_dang.jifen')}}</label>
                <div class="layui-input-block yy">
                    <input type="number" name="jifen" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="0" >
                </div>
            </div>
        @endcan
        <div class="layui-form-item" pane="">
            <label class="layui-form-label">{{trans('theme_dang.if_all')}}</label>
            <div class="layui-input-block ">
                <input type="radio" name="if_all" value="0" @if(old('if_all',$theme_dang->if_all) == 0) checked="" @endif title="{{trans('theme_dang.if_all_0')}}" lay-verify="required">
                <input type="radio" name="if_all" value="1" @if(old('if_all',$theme_dang->if_all) == 1) checked="" @endif title="{{trans('theme_dang.if_all_1')}}" lay-verify="required">
            </div>
        </div>

        <div class="layui-form-item">
            {{--<div class="layui-input-block">--}}
            <button class="layui-btn" lay-submit="" lay-filter="demo1">{{trans('global.submit')}}</button>
            <button type="reset" class="layui-btn layui-btn-primary">{{trans('global.reset')}}</button>
            <a class="layui-btn" href="{{route('wap.admin_themed_destroy',['id'=>$theme_dang->id])}}">
           删除
            </a>
            {{--</div>--}}
        </div>
    </form>

@stop
@section('js')
    <script type="text/javascript"  src="{{asset('layui/lib/jquery/jquery-2.1.4.js')}}"></script>
    <script type="text/javascript"  src="{{ asset('editor/js/module.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('editor/js/hotkeys.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('editor/js/uploader.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('editor/js/simditor.js') }}"></script>

    <script>
        $(document).ready(function(){
            var editor = new Simditor({
                textarea: $('#editor'),
                upload: {
                    url: '{{ route('wap.upload_image') }}',
                    params: { _token: '{{ csrf_token() }}' },
                    fileKey: 'file',
                    connectionCount: 3,
                    leaveConfirm: '{{trans('global.leaveConfirm')}}'
                },
                pasteImage: true,
            });
        });
    </script>
@stop