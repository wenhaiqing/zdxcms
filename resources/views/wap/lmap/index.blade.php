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
        .layui-laypage .layui-laypage-curr .layui-laypage-em{background-color: #03a9f4;}
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
    <div id="svgContent" style="">

    </div>
    <div id="outtext">
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
                <div id="paginate-render" style=""> </div>
            @else
                <br/>
                <blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>
            @endif
        </section>
    </div>
@stop

@section('js')
    @include('wap.layouts._paginate',[ 'count' => $list->total(), ])
    <script src="{{asset('wap/llmap/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('wap/llmap/js/sq.js')}}"></script>
    <script>
        getLvliang();

        function getIndex(result) {
            $("#svgContent").html(result);
            sqajax.adaptation($("svg"));
            var linxian = $("#p1");
            var lanxian = $("#p2");
            var fangshanxian = $("#p3");
            var jiaochengxian = $("#p4");
            var wenshuixian = $("#p5");
            var fenyanshi = $("#p6");
            var lishiqu = $("#p7");
            var liulinxian = $("#p8");
            var zhongyangxian = $("#p9");
            var xiaoyishi = $("#p10");
            var jiaokouxian = $("#p11");
            var shilouxian = $("#p12");
            var xingxian = $("#p13");

            linxian.click(function () {
                console.log("你点了临县");
                sqajax.openURL("{{'toxian/linxian/临县'}}");
            });
            lanxian.click(function () {
                console.log("你点了岚县");
                sqajax.openURL("{{'toxian/lanxian/岚县'}}");
            });
            fangshanxian.click(function () {
                console.log("你点了方山县");
                sqajax.openURL("{{'toxian/fangshanxian/方山县'}}");
            });
            jiaochengxian.click(function () {
                console.log("你点了交城县");
                sqajax.openURL("{{'toxian/jiaochengxian/交城县'}}");
            });
            wenshuixian.click(function () {
                console.log("你点了文水县");
                sqajax.openURL("{{'toxian/wenshuixian/文水县'}}");
            });
            fenyanshi.click(function () {
                console.log("你点了汾阳市");
                sqajax.openURL("{{'toxian/fenyangshi/汾阳市'}}");
            });
            lishiqu.click(function () {
                console.log("你点了离石区");
                sqajax.openURL("{{'toxian/lishiqu/离石区'}}");
            });
            liulinxian.click(function () {
                console.log("你点了柳林县");
                sqajax.openURL("{{'toxian/liulinxian/柳林县'}}");
            });
            zhongyangxian.click(function () {
                console.log("你点了中阳县");
                sqajax.openURL("{{'toxian/zhongyangxian/中阳县'}}");
            });
            xiaoyishi.click(function () {
                console.log("你点了孝义市");
                sqajax.openURL("{{'toxian/xiaoyishi/孝义市'}}");
            });
            jiaokouxian.click(function () {
                console.log("你点了交口县");
                sqajax.openURL("{{'toxian/jiaokouxian/交口县'}}");
            });
            shilouxian.click(function () {
                console.log("你点了石楼县");
                sqajax.openURL("{{'toxian/shilouxian/石楼县'}}");
            });
            xingxian.click(function () {
                console.log("你点了兴县");
                sqajax.openURL("{{'toxian/xingxian/兴县'}}");
            });
        }

        function getLvliang() {
            sqajax.getDate("{{route('wap.getxian',['name'=>'lishi'])}}", {"type": "getIndex"});
        }


    </script>
@stop