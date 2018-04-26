@extends('wap.layouts._header')

@php
    $keyword = request('keyword', '');
@endphp

@section('content')

    <header class="aui-bar aui-bar-nav">
        <div class="aui-pull-left aui-btn" tapmode onclick="window.history.go(-1);">
            <span class="aui-iconfont aui-icon-left"></span>
        </div>
        <div class="aui-title" style="left:2rem; right: 2rem;">
            <div class="aui-searchbar" id="search">
                <div class="aui-searchbar-input aui-border-radius">
                    <i class="aui-iconfont aui-icon-search"></i>
                    <form class="layui-form layui-form-pane" id="search-form" method="GET" action="">
                        <input name="keyword" type="search" placeholder="请输入搜索内容" id="zdx-search" value="{{$keyword}}">
                        {{--<input name="id" type="hidden"  value="{{$user_id}}">--}}
                    </form>
                    <div class="aui-searchbar-clear-btn">
                        <i class="aui-iconfont aui-icon-close"></i>
                    </div>
                </div>
                <div class="aui-searchbar-btn" tapmode>取消</div>
            </div>
        </div>
        <div class="aui-pull-right aui-btn aui-btn-outlined search-button" id="search-button">
            <span class="aui-iconfont aui-icon-search"></span>
        </div>
    </header>

    {{--<div class="sptop"><img src="{{asset('wap/bootstrap/images/lldj/splunbo.jpg')}}"/></div>--}}
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