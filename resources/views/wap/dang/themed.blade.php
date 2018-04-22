@extends('wap.layouts._header')


@section('content')

    <header class="aui-bar aui-bar-nav" id="header">
        <a class="aui-btn aui-pull-left" tapmode onclick="window.history.go(-1);">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <div class="aui-title">主题党日</div>
    </header>
    <div class=" sqhdtit"><img src="{{asset('wap/bootstrap/images/lldj/ztdr1.jpg')}}" width="100%"/></div>
    @if($themeds->count())
    @foreach($themeds as $index=>$themed)
        <a href="{{route('wap.themedlist',['id'=>$themed->id])}}" class="list-group-item">{{$themed->name}}</a>
    @endforeach
    <div id="paginate-render"></div>
    @else
        <br />
        <blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>
    @endif
    <div style=" width:100%;position:relative; bottom:0; left:auto; margin:0 auto;max-width:760px; t"><img src="{{asset('wap/bootstrap/images/lldj/mybg.jpg')}}"  width="100%"/></div>
    @stop

@section('js')
    @include(getThemeView('layouts._paginate'),[ 'count' => $themeds->total(), ])
@stop