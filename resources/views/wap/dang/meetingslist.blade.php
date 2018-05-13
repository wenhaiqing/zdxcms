<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />-->
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>吕梁智慧党建——三会一课</title>
    <link rel="stylesheet" type="text/css" href="{{asset('wap/new/css/index.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('wap/new/css/sanhuiyk.css')}}">
    <link rel="stylesheet" href="{{asset('layui/lib/layui/css/layui.css')}}" media="all" />
    <script src="{{asset('wap/llmap/js/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('layui/lib/layui/layui.all.js')}}"></script>
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
    <img src="{{asset('wap/new/images/shyk_top.jpg')}}" width="100%"/>
</div>
<div class="t-main1">
    @if($meetings->count())
    <ul class="sanhuiyk">
        @foreach($meetings as $index=>$meeting)
            <a href="{{route('wap.meetingsdetail',['id'=>$meeting->id,'title'=>$meeting->meeting_title])}}">
                <li>
                    <a href="" >
                        <div class="leftw"> <img src="{{asset('wap/new/images/shyk_top.jpg')}}"  alt="" /></div>
                        <div class="rightw"> <p>{{$meeting->meeting_title}}</p> </div>
                    </a>
                    <div class="clear"></div>
                </li>
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
@include(getThemeView('layouts._paginate'),[ 'count' => $meetings->total(), ])
</html>
