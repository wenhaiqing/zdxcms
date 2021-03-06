@extends('wap.layouts._header')

@php
    $keyword = request('keyword', '');
@endphp
@section('css')
    <style>
        .aui-list .aui-list-item-inner {    position: relative;
            min-height: 2rem;
            padding-right: 0.75rem;
            width: 100%;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-flex: 1;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            border-left: #03a9f4 3px solid;
            margin: 0.5em 0;
            padding-left: 0.75rem;}
        .layui-laypage .layui-laypage-curr .layui-laypage-em{background-color: #c52030;}
        #paginate-render{padding-left:0;
            text-align: center;}
    </style>

@stop
@section('content')
    <header class="aui-bar aui-bar-nav">
        <div class="aui-pull-left aui-btn" tapmode onclick="window.history.go(-1);">
            <span class="aui-iconfont aui-icon-left"></span>
        </div>
        <div class="aui-title" style="left:2rem; right: 2rem;">
            <div class="aui-searchbar" id="search">
                <div class="aui-searchbar-input aui-border-radius">
                    <i class="aui-iconfont aui-icon-search"></i>
                    <form class="layui-form layui-form-pane" id="search-form" method="GET" action="{{route('wap.searchdang')}}">
                        <input name="keyword" type="search" placeholder="请输入搜索内容" id="zdx-search" value="{{$keyword}}">
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
    @include('flash::message')
    <section class="aui-content-padded">
        @if($list->count())
            <div class="aui-content aui-margin-b-15">
                <ul class="aui-list aui-list-in">
                    @foreach($list as $index=>$v)
                        <a href="{{route('wap.list_tree',['id'=>$v->id])}}">
                            <li class="aui-list-item">
                                <div class="aui-list-item-inner">
                                    <div class="aui-list-item-title">{{$v->name}}</div>
                                    @if($v->if_zhi==1)
                                        <div class="aui-list-item-right">
                                            <div class="aui-label aui-label-info">直属</div>
                                        </div>
                                    @endif
                                </div>
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
            <div id="paginate-render"></div>
        @else
            <br/>
            <blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>
        @endif
    </section>

@stop
@section('js')
    @include('wap.layouts._paginate',[ 'count' => $list->total(), ])
@stop

