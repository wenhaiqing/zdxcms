@extends(getThemeView('layouts.main'))
@php
    $image = is_json($topic->image) ? json_decode($topic->image) : new \stdClass();
@endphp

@section('content')

    <form class="layui-form layui-form-pane" method="POST"
          action="{{ $topic->id ? route('topics.update', $topic->id) : route('topics.store') }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" class="mini-hidden" value="{{ $topic->id ? 'PATCH' : 'POST' }}">
        <input type="hidden" name="member_id" value="{{$topic->member_id}}">
        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('topics.title')}}</label>
            <div class="layui-input-block">
                <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder=""
                       class="layui-input" value="{{ old('title',$topic->title) }}">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">{{trans('topics.content')}}</label>
            <div class="layui-input-block">
                <textarea placeholder="请输入内容" name="content" class="layui-textarea">{{$topic->content }}</textarea>
            </div>
        </div>
        <div class="layui-upload">
            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                图片：
                <div class="layui-upload-list" id="demo2">
                    @if(get_json_params($topic->image,'0'))
                        @foreach($image as $index=>$v)
                            <a href="{{$v}}">
                            <img src="{{$v}}" class="layui-upload-img"
                                 style="width: 92px;height: 92px;margin: 0 10px 10px 0;"/>
                            </a>
                        @endforeach
                    @endif
                </div>
            </blockquote>
        </div>

        {{--<div class="layui-form-item">--}}
            {{--<label class="layui-form-label">{{trans('topics.view_count')}}</label>--}}
            {{--<div class="layui-input-block">--}}
                {{--<input type="number" id="view_count" name="view_count" lay-verify="required" autocomplete="off"--}}
                       {{--placeholder=""--}}
                       {{--class="layui-input" value="{{ old('view_count',$topic->view_count) }}">--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('topics.reply_count')}}</label>
            <div class="layui-input-block">
                <input type="number" id="reply_count" name="reply_count" lay-verify="required" autocomplete="off"
                       placeholder=""
                       class="layui-input" value="{{ old('reply_count',$topic->view_count) }}">
            </div>
        </div>
        <div class="layui-form-item" pane="">
            <label class="layui-form-label">{{trans('topics.status')}}</label>
            <div class="layui-input-block">
                <input type="radio" name="status" value="0" @if(old('status',$topic->status) == 0) checked=""
                       @endif title="{{trans('topics.status_0')}}" lay-verify="required">
                <input type="radio" name="status" value="1" @if(old('status',$topic->status) == 1) checked=""
                       @endif title="{{trans('topics.status_1')}}"  lay-verify="required">
            </div>
        </div>
        <div class="layui-form-item" pane="">
            <label class="layui-form-label">{{trans('topics.if_cream')}}</label>
            <div class="layui-input-block">
                <input type="radio" name="if_cream" value="0" @if(old('if_cream',$topic->if_cream) == 0) checked=""
                       @endif title="{{trans('topics.if_cream_0')}}" checked lay-verify="required">
                <input type="radio" name="if_cream" value="1" @if(old('if_cream',$topic->if_cream) == 1) checked=""
                       @endif title="{{trans('topics.if_cream_1')}}"  lay-verify="required">
            </div>
        </div>
        @can('jifen_topic')
            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('topic.jifen')}}</label>
                <div class="layui-input-block">
                    <input type="number" name="jifen" lay-verify="required" autocomplete="off" placeholder=""
                           class="layui-input" value="0">
                </div>
            </div>
        @endcan

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit="" lay-filter="demo1">{{trans('global.submit')}}</button>
                <button type="reset" class="layui-btn layui-btn-primary">{{trans('global.reset')}}</button>
            </div>
        </div>
    </form>
@endsection
