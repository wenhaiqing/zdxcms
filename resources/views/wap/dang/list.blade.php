@extends('wap.layouts._header')


@section('content')
    <header class="aui-bar aui-bar-nav" id="header">
        <a class="aui-btn aui-pull-left" tapmode onclick="window.history.go(-1);">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <div class="aui-title">党组织选择</div>
    </header>
    @foreach($list as $index=>$v)
        <a href="{{route('wap.list_tree',['id'=>$v->id])}}" class="list-group-item">{{$v->name}}</a>
    @endforeach

@stop
@section('js')
    <script type="text/javascript" src="{{asset('layui/lib/layui/layui.all.js')}}"></script>
@stop
    @include(getThemeView('layouts._paginate'),[ 'count' => 0, ])
