@extends('wap.layouts._header')


@section('content')
    <header class="aui-bar aui-bar-nav" id="header">
        <div class="aui-pull-left aui-btn" tapmode onclick="window.history.go(-1);">
            <span class="aui-iconfont aui-icon-left"></span>
        </div>
        <div class="aui-title">三会一课</div>
        <a href="{{route('wap.meeting_signlist',['meeting_id'=>$id])}}" class="aui-pull-right aui-btn ">
            <span class="">随笔记录</span>
        </a>
    </header>
    {{--<div class=" sqhdtit"><img src="{{asset('wap/bootstrap/images/lldj/ztdr1.jpg')}}" width="100%"/></div>--}}
    @foreach($meetings as $index=>$meeting)
        <section class="aui-content-padded">
            <div class="aui-card-list">
                <div class="aui-card-list-header">
                    {{$meeting->meeting_title}}
                </div>
                <div class="aui-card-list-content-padded">
                    {!! $meeting->meeting_compere !!}
                </div>
                <div class="aui-card-list-content-padded">
                    {!! $meeting->meeting_content !!}
                </div>

                <div class="aui-card-list-footer">
                    {{$meeting->created_at}}
                </div>
            </div>
        </section>
        <a href="{{route('wap.meeting_sign',['meeting_id'=>$meeting->id])}}">
        <button type="" class="aui-btn aui-btn-block aui-btn-sm " style="background-color: #03a9f4"><span
                    style="color: #ffffff">签到/随笔</span></button>
        </a>
    @endforeach
    <div style=" width:100%;position:relative; bottom:0; left:auto; margin:0 auto;max-width:760px; t"><img
                src="{{asset('wap/bootstrap/images/lldj/mybg.jpg')}}" width="100%"/></div>
@stop