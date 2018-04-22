@extends('wap.layouts._header')
@section('css')
    <style>
        .aui-searchbar {
            background: transparent;
        }
        .aui-bar-nav .aui-searchbar-input {
            background-color: #ffffff;
        }
        .aui-bar-light .aui-searchbar-input {
            background-color: #f5f5f5;
        }
    </style>
    @stop

@section('content')

    <header class="aui-bar aui-bar-nav">
        <a class="aui-pull-left aui-btn">
            <span class="aui-iconfont aui-icon-left"></span>
        </a>
        <div class="aui-title" style="left:2rem; right: 2rem;">
            <div class="aui-searchbar" id="search">
                <div class="aui-searchbar-input aui-border-radius">
                    <i class="aui-iconfont aui-icon-search"></i>
                    <input type="search" placeholder="请输入搜索内容" id="search-input">
                    <div class="aui-searchbar-clear-btn">
                        <i class="aui-iconfont aui-icon-close"></i>
                    </div>
                </div>
                <div class="aui-searchbar-btn" tapmode>取消</div>
            </div>
        </div>
        <a class="aui-pull-right aui-btn aui-btn-outlined">
            <span class="aui-iconfont aui-icon-search"></span>
        </a>
    </header>
    <div class=" sqhdtit"><img src="{{asset('wap/bootstrap/images/lldj/ztdr1.jpg')}}" width="100%"/></div>
    <section class="aui-content-padded">
        @if($themeds->count())
        <div class="aui-content aui-margin-b-15">
            <ul class="aui-list aui-list-in">

    @foreach($themeds as $index=>$themed)
                <a href="{{route('wap.themeddetail',['id'=>$themed->id,'title'=>$themed->title])}}">
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-title">{{$themed->title}}</div>
                        @if($themed->if_cream==1)
                        <div class="aui-list-item-right">
                            <div class="aui-label aui-label-info">精华</div>
                        </div>
                            @endif
                    </div>
                </li>
        </a>
            </ul>
        </div>
    @endforeach
    <div id="paginate-render"></div>
    @else
        <br />
        <blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>
    @endif
    </section>
    <div style=" width:100%;position:relative; bottom:0; left:auto; margin:0 auto;max-width:760px; t"><img src="{{asset('wap/bootstrap/images/lldj/mybg.jpg')}}"  width="100%"/></div>
    @stop
@section('js')
    @include(getThemeView('layouts._paginate'),[ 'count' => $themeds->total(), ])
@stop