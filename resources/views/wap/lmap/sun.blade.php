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
    <div id="svgContent" style="overflow: hidden;">

    </div>
<div id="outtext">
    <div class="areacon clear">
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

    </div>
</div>

    @stop
@section('js')
    @include('wap.layouts._paginate',[ 'count' => $list->total(), ])
<script src="{{asset('wap/llmap/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('wap/llmap/js/sq.js')}}"></script>
<script>
    //此处id市县的id编号，通过php动态获取get或者post过来的id值
    var name = "{{$name}}";
    getmap(name);
    function getmap(name) {
        {{--console.log("你点了"+"{{$title}}");--}}
        sqajax.getDate("{{route('wap.getxian',['name'=>$name])}}",{"type":"showXian"});
    }
    function showXian(result) {
        $("#svgContent").html(result);
        sqajax.adaptation($("svg"));
        //这里是乡镇点击事件
        $(".xiang").click(function(){
            //sqajax.thisInfo返回的是一个包含id、title、obj（对象本身）信息的对象
//            console.log(sqajax.thisInfo(this).id);
//            console.log(sqajax.thisInfo(this).title);
//            console.log(sqajax.thisInfo(this).obj);
            window.location.href = "/wap/danglist/"+sqajax.thisInfo(this).title;
        });
    }
</script>
@stop