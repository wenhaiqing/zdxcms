@extends(getThemeView('layouts.main'))
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('editor/css/simditor.css') }}">
    @endsection
@section('content')

    <form class="layui-form layui-form-pane" method="POST" action="{{ $notify->id ? route('notifies.update', $notify->id) : route('notifies.store') }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" class="mini-hidden" value="{{ $notify->id ? 'PATCH' : 'POST' }}">

        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('notifies.title')}}</label>
            <div class="layui-input-block">
                <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('title',$notify->title) }}" >
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('notifies.content')}}</label>
            <div class="layui-input-block">
                <input type="text" id="editor" name="content" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('content',$notify->content) }}" >
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
            });
        });
    </script>
    @stop