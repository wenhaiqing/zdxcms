@extends(getThemeView('layouts.main'))
@section('css')
    <style>
        .layui-upload-img{width: 92px; height: 92px; margin: 0 10px 10px 0;}
    </style>
    @stop
@section('content')

    <form class="layui-form layui-form-pane" method="POST" action="{{ $videoCategory->id ? route('videos.category.update', $videoCategory->id) : route('videos.category.store') }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" class="mini-hidden" value="{{ $videoCategory->id ? 'PATCH' : 'POST' }}">
        <input type="hidden" name="id" value="{{$videoCategory->id}}">
        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('video.title')}}</label>
            <div class="layui-input-block">
                <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('title',$videoCategory->title) }}" >
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