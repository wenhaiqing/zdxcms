@extends('wap.layouts._header')


@section('content')

    <header class="aui-bar aui-bar-nav" id="header">
        <a class="aui-btn aui-pull-left" tapmode onclick="window.history.go(-1);">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <div class="aui-title">通知公告</div>
    </header>
    <div class=" sqhdtit"><img src="{{asset('wap/bootstrap/images/lldj/tzgglist.jpg')}}" width="100%"/></div>
    @foreach($notices as $index=>$notice)
        <a href="{{route('wap.noticedetail',['id'=>$notice->id,'title'=>$notice->title])}}" class="list-group-item">{{$notice->title}}</a>
    @endforeach
    <div style=" width:100%;position:relative; bottom:0; left:auto; margin:0 auto;max-width:760px; t"><img src="{{asset('wap/bootstrap/images/lldj/mybg.jpg')}}"  width="100%"/></div>
    @stop
