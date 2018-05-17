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

    <form class="layui-form layui-form-pane" method="POST" action="{{ $notify->id ? route('wap.admin_notice_update', ['id'=>$notify->id]) : route('wap.admin_notice_store') }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" class="mini-hidden" value="{{ $notify->id ? 'PATCH' : 'POST' }}">
        <input type="hidden" name="user_id" value="{{Auth()->guard('wap')->user()->if_admin}}">
        <div class="layui-form-item">
            <div class="layui-input-block yy">
                <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="请输入通知标题" class="layui-input" value="{{ old('title',$notify->title) }}" >
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block yy">
                <input type="text" id="editor" name="content" lay-verify="required" autocomplete="off" placeholder="请输入通知内容" class="layui-input" value="{{ old('content',$notify->content) }}" >
            </div>
        </div>


        <div class="layui-form-item">
            {{--<div class="layui-input-block">--}}
            <button class="layui-btn" lay-submit="" lay-filter="demo1">{{trans('global.submit')}}</button>
            <button type="reset" class="layui-btn layui-btn-primary">{{trans('global.reset')}}</button>
            <a class="layui-btn" href="{{route('wap.admin_notice_destroy',['id'=>$notify->id])}}">
                删除
            </a>
            {{--</div>--}}
        </div>
    </form>
@endsection
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