@extends(getThemeView('layouts.main'))
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('editor/css/simditor.css') }}">
    @endsection
@section('content')

    <form class="layui-form layui-form-pane" method="POST" action="{{ $buildDang->id ? route('builddangs.update', $buildDang->id) : route('builddangs.store') }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" class="mini-hidden" value="{{ $buildDang->id ? 'PATCH' : 'POST' }}">
        <input type="hidden" name="user_id" value="{{$buildDang->id ? $buildDang->user_id : Auth()->id()}}">
        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('builddangs.title')}}</label>
            <div class="layui-input-block">
                <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('title',$buildDang->title) }}" >
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('builddangs.content')}}</label>
            <div class="layui-input-block">
                <input type="text" id="editor" name="content" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('content',$buildDang->content) }}" >
            </div>
        </div>

        <div class="layui-form-item">
            {{--<div class="layui-input-block">--}}
            <button class="layui-btn" lay-submit="" lay-filter="demo1">{{trans('global.submit')}}</button>
            <button type="reset" class="layui-btn layui-btn-primary">{{trans('global.reset')}}</button>
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
                    url: '{{ route('upload_image') }}',
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