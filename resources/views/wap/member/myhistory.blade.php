@extends('wap.layouts._header')


@section('content')
    <header class="aui-bar aui-bar-nav" id="header">
        <div class="aui-pull-left aui-btn" tapmode onclick="window.history.go(-1);">
            <span class="aui-iconfont aui-icon-left"></span>
        </div>
        <div class="aui-title">我的足迹</div>
    </header>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
        <legend>简约足迹：大事记</legend>
    </fieldset>
    <section class="aui-content-padded">
        @if($lists->count())
    <ul class="layui-timeline">
        @foreach($lists as $index=>$list)
        <li class="layui-timeline-item">
            <i class="layui-icon layui-timeline-axis"></i>
            <div class="layui-timeline-content layui-text">
                <div class="layui-timeline-title">{{$list->action_time}}，{{$list->log}}</div>
            </div>
        </li>
        @endforeach
    </ul>
            <div id="paginate-render"></div>
        @else
            <br/>
            <blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>
        @endif
    </section>
    @stop
