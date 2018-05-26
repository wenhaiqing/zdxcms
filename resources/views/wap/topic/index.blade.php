<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>吕梁智慧党建云—互助中心</title>
    <link rel="stylesheet" href="{{asset('layui/lib/layui/css/layui.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('wap/new/huzhu/css/index.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('wap/new/huzhu/css/each.css')}}">

    <style type="text/css">
        body{ font-size:14px}
        /*作图右文*/
        .leftimg{display:inline-table; float:left;}
        .righttext{width: 77%;display:inline-table;white-space:pre-wrap;color:#0066CC; float:left;text-align:justify;}
        /*作图右文*/

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
    <img src="{{asset('wap/new/huzhu/images/each_top.jpg')}}"/>
</div>
<a href="{{route('wap.topic_create')}}"><div class="publish">我要发布</div></a>
<div class="e_main">
    @if($topics->count())
    <ul>
        @foreach($topics as $index=>$topic)
        <li>
            <a href="{{route('wap.topic_show',['id'=>$topic->id])}}">
                <div class="e_main_left">
                    @if(get_json_params($topic->image,'0'))
                        <img src="{{get_json_params($topic->image,'0')}}" />
                    @else
                        <img src="{{asset('wap/bootstrap/images/test/head_logo.jpg')}}" />
                    @endif
                </div>
                <div class="e_main_right">
                    <div class="e_main_user">
                        <div class="e_main_user_icon">
                            @if($topic->member->avatar)
                                <img src="{{$topic->member->avatar}}" class="aui-img-round" >
                            @else
                                <img src="{{asset('wap/bootstrap/images/test/head_logo.jpg')}}" class="aui-img-round" >
                            @endif
                            <span class="vert" style="color:#666666">{{$topic->member->name}}</span></div>
                        <div  style="text-align:right; float:right"><img src="{{asset('wap/new/huzhu/images/guanzhu.png')}}" style="margin-right:0.5em"><small><span class="vert">共</span><span class="vert">{{$topic->reply_count}}</span><span class="vert">人回复</span></small></div>
                    </div>
                    <div class="e_main_right_con" style="clear:both"> {{ $topic->excerpt }}</div>
                    <div  class="e_main_right_bot vert"><small>{{$topic->created_at}}</small></div>
                </div>
            </a>
            <div class="clear">

            </div>
        </li>
            @endforeach
    </ul>
        <div id="paginate-render"></div>
        @endif
</div>
{{--<div class="width-pub"><a href="">更多>>&nbsp;&nbsp;</a></div>--}}
<div class="clear"></div>
<div class="t-main1">
    <div style=" border-bottom:1px solid #FF3333; height:2.5em">
        <span style=" font-size:14px;padding:0.5em 1em; background:#FF3333; color:#ffffff;line-height: 3em;">热点推荐</span>
    </div>
    @if($topicsjin->count())
    <ul class="each">
        @foreach($topicsjin as $index=>$topic)
        <li>
            <a href="">
                <div class="e_main_user">
                    <div class="e_main_user_icon">
                        @if($topic->member->avatar)
                            <img src="{{$topic->member->avatar}}" class="aui-img-round" >
                        @else
                            <img src="{{asset('wap/bootstrap/images/test/head_logo.jpg')}}" class="aui-img-round" >
                        @endif
                        <span class="vert" style="color:#666666">{{$topic->member->name}}</span></div>
                    <div  style="text-align:right; float:right"><img src="{{asset('wap/new/huzhu/images/guanzhu.png')}}" style="margin-right:0.5em"><small><span class="vert">共</span><span class="vert">{{$topic->reply_count}}</span><span class="vert">人回复</span></small></div>
                </div>
                <div class="each_con" style="clear:both"> {{ $topic->excerpt }}</div>
            </a><hr style=" border:none;border-bottom:1px dashed #CCCCCC; height:1em"/>
        </li>
        @endforeach
        @if($topicsjin->count()>config('wap.global.paginate'))
                <div id="paginate-render"></div>
            @endif
    </ul>
        @endif
</div>
<script type="text/javascript" src="{{asset('layui/lib/layui/layui.all.js')}}"></script>
@include(getThemeView('layouts._paginate'),[ 'count' => $topics->total(), ])
</body>
</html>
