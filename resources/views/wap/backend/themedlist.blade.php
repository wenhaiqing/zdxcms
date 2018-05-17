@extends('wap.layouts._header')

@php
    $keyword = request('keyword', '');
@endphp
@section('css')
    <style>
        .aui-list .aui-list-item-inner {
            position: relative;
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
            padding-left: 0.75rem;
        }

        .layui-laypage .layui-laypage-curr .layui-laypage-em {
            background-color: #03a9f4;
        }

        #paginate-render {
            padding-left: 0;
            text-align: center;
        }
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
                    <form class="layui-form layui-form-pane" id="search-form" method="GET" action="">
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
    <div class=" sqhdtit"><img src="{{asset('wap/bootstrap/images/lldj/ztdr1.jpg')}}" width="100%"/></div>
    @if($themeds->count())
    <section class="aui-content-padded">

            <div class="aui-content aui-margin-b-15">
                <ul class="aui-list aui-list-in">

                    @foreach($themeds as $index=>$themed)
                        <a href="{{route('wap.admin_themed_edit',['id'=>$themed->id])}}">
                            <li class="aui-list-item">
                                <div class="aui-list-item-inner">
                                    <div class="aui-list-item-title">{{$themed->title}}</div>

                                        <div class="aui-list-item-right">
                                            <a href="javascript:;" data-url="{{ route('wap.admin_themed_destroy',['id'=>$themed->id]) }}" class="layui-btn layui-btn-sm layui-btn-danger form-delete">{{trans('global.delete')}}</a>
                                        </div>

                                </div>
                            </li>
                        </a>

                    @endforeach
                </ul>
            </div>
            <div id="paginate-render"></div>

    </section>
    <a href="{{route('wap.admin_themed_create')}}"><button class="layui-btn layui-btn-fluid">发布主题党日</button></a>
    <div style=" width:100%;position:relative; bottom:0; left:auto; margin:0 auto;max-width:760px; t"><img
                src="{{asset('wap/bootstrap/images/lldj/mybg.jpg')}}" width="100%"/></div>
    @else
        {{--<br/>--}}
        {{--<blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>--}}
    @endif
    <form id="delete-form" action="" method="POST" style="display:none;">
        <input type="hidden" name="_method" value="DELETE">
        {{ csrf_field() }}
    </form>
@stop
@section('js')
    @include(getThemeView('layouts._paginate'),[ 'count' => $themeds->total(), ])
@stop