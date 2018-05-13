<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />-->
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>吕梁共产党员党建云—党建动态</title>
    <link rel="stylesheet" type="text/css" href="{{asset('wap/new/css/index.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('wap/new/css/tonggao.css')}}">
    <link rel="stylesheet" href="{{asset('layui/lib/layui/css/layui.css')}}" media="all" />
    <script src="{{asset('wap/llmap/js/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('layui/lib/layui/layui.all.js')}}"></script>
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
    <script type="text/javascript">

        document.addEventListener('plusready', function(){
            //console.log("所有plus api都应该在此事件发生后调用，否则会出现plus is undefined。"

        });

        $(function () {
            docEl = document.documentElement;
            var width = docEl.clientWidth>768?768:docEl.clientWidth;
            fontsize = 20 * (width / 320) > 20 ? 20 * (width / 320) : 20;
            docEl.style.fontSize = fontsize + 'px';
            window.onresize = function () {
                docEl = document.documentElement;
                width = docEl.clientWidth>768?768:docEl.clientWidth;
                fontsize = 20 * (width / 320) > 20 ? 20 * (width / 320) : 20;
                docEl.style.fontSize = fontsize + 'px';
            }
        })
    </script>
</head>
<body style="max-width: 750px;margin: 0 auto;">

<div class="banner">
{{--    <img src="{{asset('wap/new/images/tonggao_top.jpg')}}"/>--}}
</div>
<div class="t-main1">
    @if($notices->count())
    <ul class="tonggao">

        @foreach($notices as $index=>$notice)
            <a href="{{route('wap.builddangdetail',['id'=>$notice->id,'title'=>$notice->title])}}">
                @if($index <=2)
                <li><img src="{{asset('wap/new/images/new.png')}}"/><span>{{$notice->title}}</span></li>
                    @else
                    <li><span>{{$notice->title}}</span></li>
                @endif
            </a>
        @endforeach
            <div id="paginate-render"></div>
    </ul>
    @else
        <br/>
        <blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>
    @endif
</div>


</body>
@include(getThemeView('layouts._paginate'),[ 'count' => $notices->total(), ])
</html>
