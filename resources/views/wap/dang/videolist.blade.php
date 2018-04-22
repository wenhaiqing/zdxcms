@extends('wap.layouts._header')

@section('css')

@stop

@section('content')

    <header class="aui-bar aui-bar-nav" id="header">
        <a class="aui-btn aui-pull-left" tapmode onclick="window.history.go(-1);">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <div class="aui-title">视频课程</div>
    </header>

    <div class="sptop"><img src="{{asset('wap/bootstrap/images/lldj/splunbo.jpg')}}"/></div>
    <section class="aui-content-padded">
        @if($lists->count())
            @foreach($lists as $index=>$list)
        <div class="aui-card-list" >
            <a href="{{route('wap.videodetail',['id'=>$list->id,'title'=>$list->title])}}">
            <div class="aui-card-list-header">
                {{$list->title}}
            </div>
            <div class="aui-card-list-content">
                <img src="{{$list->cover}}" />
            </div>
            <div class="aui-card-list-footer">
                {{$list->created_at}}
                @if($list->if_cream==1)
                <div class="aui-list-item-right">
                    <div class="aui-label aui-label-info">精华</div>
                </div>
                    @endif
            </div>
            </a>
        </div>
            @endforeach
                <div id="paginate-render"></div>
        @else
            <br />
            <blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>
        @endif
    </section>

@stop

@section('js')
    @include(getThemeView('layouts._paginate'),[ 'count' => $lists->total(), ])
@stop