@php
    $image = is_json($topics->image) ? json_decode($topics->image) : new \stdClass();
@endphp

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>吕梁智慧党建云—我要留言</title>
    <link rel="stylesheet" type="text/css" href="{{asset('wap/new/huzhu/css/index.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('wap/new/huzhu/css/message.css')}}">

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
<a href="{{route('wap.topic_create')}}"><div class="publish">我要发布&nbsp;&nbsp;</div></a>
<div class="info">
    <div class="e_main_right">
        <div class="width-pub">
            <div class="e_main_user_icon">
                @if($topics->member->avatar)
                    <img src="{{$topics->member->avatar}}" >
                @else
                    <img src="{{asset('wap/bootstrap/images/test/head_logo.jpg')}}">
                @endif
                <span class="vert" style="color:#666666">{{$topics->member->name}}</span></div>
            <div  style="text-align:right; float:right"><img src="{{asset('wap/new/huzhu/images/guanzhu.png')}}" style="margin-right:0.5em"><small><span class="vert">共</span><span class="vert">{{$topics->reply_count}}</span><span class="vert">条回复</span></small></div>
        </div><div class="clear"></div>
        <h3 class="width-pub"> {{ $topics->title }}</h3>
        <div class="e_main_left">
            @if(get_json_params($topics->image,'0'))
                @foreach($image as $index=>$v)
                    <div class="aui-col-xs-4">
                        <a href="{{$v}}">
                            <img class="image-item" src="{{$v}}"/>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="e_main_right_con" style="clear:both"> {!! $topics->content !!}</div>
        <div  class="e_main_right_bot vert width-pub"><small>{{$topics->created_at}}</small></div>
    </div>
</div>
<div class="message">
    <span style=" font-size:14px;padding:0.5em 1em; background:#FF3333; color:#ffffff;line-height: 3em;">我要留言</span>
    <div class="message-con">
        <form action="{{route('wap.reply_store')}}" method="POST" accept-charset="UTF-8">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="topic_id" value="{{ $topics->id }}">
            <textarea name="content" cols="" rows=""></textarea><br/><br/>
            <input type="submit" name="button" id="button" value="回复"  class="subbut"><br/>
        </form>
    </div>
</div><br/>
<div class="clear"></div>
@if ($topics->replies->count())
<div class="t-main1">
    <div style=" border-bottom:1px solid #FF3333; height:2.5em">
        <span style=" font-size:14px;padding:0.5em 1em; background:#FF3333; color:#ffffff;line-height: 3em;">回复信息</span>
    </div>

    <ul class="each">
        @foreach($topics->replies as $index=>$reply)
        <li>
            <a href="{{route('wap.topic_show',['id'=>$reply->topic_id])}}">
                <div class="e_main_user">
                    <div class="e_main_user_icon">
                        @if($reply->member->avatar)
                            <img src="{{$reply->member->avatar}}" >
                        @else
                            <img src="{{asset('wap/bootstrap/images/test/head_logo.jpg')}}">
                        @endif
                        <span class="vert" style="color:#666666">{{$reply->member->name}}</span></div>
                    <div  style="text-align:right; float:right"></div>
                </div>
                <div class="each_con" style="clear:both"> {!! $reply->content !!}</div>
            </a><hr style=" border:none;border-bottom:1px dashed #CCCCCC; height:1em"/>
        </li>
            @endforeach


    </ul>

</div>
@endif
</body>
</html>
