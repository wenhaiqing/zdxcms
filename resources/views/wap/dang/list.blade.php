@extends('wap.layouts._header')


@section('content')
    <header class="aui-bar aui-bar-nav" id="header">
        <a class="aui-btn aui-pull-left" tapmode onclick="window.history.go(-1);">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <div class="aui-title">党组织选择</div>
    </header>
    @if($list->count())
    @foreach($list as $index=>$v)
        <a href="{{route('wap.list_tree',['id'=>$v->id])}}" class="list-group-item">{{$v->name}}</a>
    @endforeach
    <div id="paginate-render"></div>
    @else
        <br />
        <blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>
    @endif

@stop
@section('js')
    @include(getThemeView('layouts._paginate'),[ 'count' => $list->total(), ])
@stop

