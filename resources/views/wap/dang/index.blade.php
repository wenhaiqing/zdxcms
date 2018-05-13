<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />-->
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>首页</title>
    <link rel="stylesheet" type="text/css" href="{{asset('wap/new/css/index.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('wap/new/css/lrtk2.css')}}"/>
    <script src="{{asset('wap/llmap/js/jquery-3.3.1.min.js')}}"></script>
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
    <style>
        a{ text-decoration:none; color:#444444; font-family:"微软雅黑",Arial, Helvetica, sans-serif}
    </style>
</head>
<body style="max-width: 750px;margin: 0 auto;">

<!-- 轮播代码 开始 -->
<div class="flex">
    <ul class="slides">
        <li>
            <img alt="" src="{{asset('wap/new/images/lunbo1.jpg')}}">
        </li>
        <li>
            <img alt="" src="{{asset('wap/new/images/lunbo3.jpg')}}">
        </li>
        <li>
            <img alt="" src="{{asset('wap/new/images/lunbo2.jpg')}}">
        </li>
        <li>
            <img alt="" src="{{asset('wap/new/images/lunbo4.jpg')}}">
        </li>
        <li>
            <img alt="" src="{{asset('wap/new/images/lunbo5.jpg')}}">
        </li>
    </ul>
</div>
<script type="text/javascript" src="{{asset('wap/new/js/jflex.min.js')}}"></script>
<script type="text/javascript">
    $('.flex').jFlex({
        autoplay: true
    });
</script>
<!-- 代码 结束 -->

<ul class="body-ula">
    <li>
        <a href="http://www.llzg.gov.cn/web/p_list.html?lmmc=%E8%A6%81%E9%97%BB%E5%8A%A8%E6%80%81&pageno=1"><img src="{{asset('wap/new/images/hsez_03.jpg')}}"/>
            <div>党建动态</div></a>
    </li>
    <li>
        <a href="{{route('wap.noticelist')}}"><img src="{{asset('wap/new/images/hsez_04.jpg')}}"/>
            <div>通知公告</div></a>
    </li>
    <li>
        <a href="{{route('wap.videos')}}"><img src="{{asset('wap/new/images/hsez_05.jpg')}}"/>
            <div>视频课程</div></a>
    </li>
    <li>
        <a href="{{route('wap.zhuanti')}}"><img src="{{asset('wap/new/images/hsez_06.jpg')}}"/>
            <div>专题教育</div></a>
    </li>
    <li>
        <a href="{{route('wap.themed')}}"><img src="{{asset('wap/new/images/hsez_07.jpg')}}"/>
            <div>主题党日</div></a>
    </li>
    <li>
        <a href="{{route('wap.meetings')}}"><img src="{{asset('wap/new/images/hsez_08.jpg')}}"/>
            <div>三会一课</div></a>
    </li>
    <li>
        <a href="{{route('wap.topic_create')}}"><img src="{{asset('wap/new/images/hsez_09.jpg')}}"/>
            <div>互动中心</div></a>
    </li>
    <li>
        <a href=""><img src="{{asset('wap/new/images/hsez_10.jpg')}}"/>
            <div>党务文书</div></a>
    </li>
    <li>
        <a href="{{route('wap.analysis.index')}}"><img src="{{asset('wap/new/images/hsez_11.jpg')}}"/>
            <div>数据中心</div></a>
    </li>
    <li>
        <a href="{{route('wap.topic_create')}}"><img src="{{asset('wap/new/images/logo10.jpg')}}"/>
            <div>每日签到</div></a>
    </li>
    <li>
        <a href=""><img src="{{asset('wap/new/images/logo11.jpg')}}"/>
            <div>党组信息</div></a>
    </li>
    <li>
        <a href="{{route('wap.analysis.index')}}"><img src="{{asset('wap/new/images/logo12.jpg')}}"/>
            <div>个人中心</div></a>
    </li>
</ul>
<footer>
    <ul>
        <li>
            <a href=""><img src="{{asset('wap/new/images/hsez_12.jpg')}}"/>
                <div>党建</div></a>
        </li>
        <li>
            <a href=""><img src="{{asset('wap/new/images/hsez_13.jpg')}}"/>
                <div>微课</div></a>
        </li>
        <li>
            <a href=""><img src="{{asset('wap/new/images/hsez_14.jpg')}}"/>
                <div>微服</div></a>
        </li>
        <li>
            <a href="{{route('wap.center')}}"><img src="{{asset('wap/new/images/hsez_15.jpg')}}"/>
                <div>我的</div></a>
        </li>
    </ul>
</footer>
</body>
</html>
