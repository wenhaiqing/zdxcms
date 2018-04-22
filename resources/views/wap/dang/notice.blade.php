@extends('wap.layouts._header')


@section('content')

    <header class="aui-bar aui-bar-nav" id="header">
        <a class="aui-btn aui-pull-left" tapmode onclick="window.history.go(-1);">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <div class="aui-title">通知公告</div>
    </header>
    <div class=" sqhdtit"><img src="{{asset('wap/bootstrap/images/lldj/tzgg.jpg')}}" width="100%"/></div>
    @if($notices->count())
    @foreach($notices as $index=>$notice)
        <a href="{{route('wap.noticelist',['id'=>$notice->id])}}" class="list-group-item">{{$notice->name}}</a>
    @endforeach
    <div id="paginate-render"></div>
    @else
        <br />
        <blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>
    @endif
    <div style=" width:100%;position:relative; bottom:0; left:auto; margin:0 auto;max-width:760px; t"><img src="{{asset('wap/bootstrap/images/lldj/mybg.jpg')}}"  width="100%"/></div>
    @stop

@section('js')
    @include(getThemeView('layouts._paginate'),[ 'count' => $notices->total(), ])
@stop