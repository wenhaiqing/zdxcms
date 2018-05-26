<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>吕梁智慧党建云—我的发布</title>
    <link rel="stylesheet" href="{{asset('layui/lib/layui/css/layui.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('wap/new/huzhu/css/index.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('wap/new/huzhu/css/publish.css')}}">

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
<a href="{{route('wap.topic_index')}}"><div class="publish"><span style="margin-right:2em">互助列表</span></div></a>
<div class="message" >
    <span style=" font-size:14px;padding:0.5em 1em; background:#FF3333; color:#ffffff;line-height: 3em;">我要留言</span>
    <div class="message-con" >
        <form action="{{route('wap.topic_store')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="status" value="1">
            <label>主题</label><input name="title" type="text"><br/><br/>
            <label style="vertical-align:top">正文</label><textarea name="content" cols="" rows=""></textarea><br/><br/>
            <div class="layui-upload">
                {{--@if(!$meeting->id)--}}
                <button type="button" class="layui-btn" id="test2">多图片上传</button>
                {{--@endif--}}
                <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                    欢迎上传更多真实照片：
                    <div class="layui-upload-list" id="demo2">

                                <div class="layui-inline">
                                </div>

                    </div>
                </blockquote>
            </div>
            <input type="submit" name="button" id="button" value="提交"  class="subbut" style="border:none"><br/>
        </form>
    </div>
</div> <br/>
<div class="clear"></div>
<!--热点推荐-->
@if($topics->count())
<div class="t-main1">
    <div style=" border-bottom:1px solid #FF3333; height:2.5em">
        <span style=" font-size:14px;padding:0.5em 1em; background:#FF3333; color:#ffffff;line-height: 3em;">我的发布</span>
    </div>

    <ul class="each">
        @foreach($topics as $index=>$topic)
        <li>
            <a href="{{route('wap.topic_show',['id'=>$topic->id])}}">
                <div class="e_main_user">
                    <div class="e_main_user_icon">
                        @if($topic->member->avatar)
                            <img src="{{$topic->member->avatar}}" class="aui-img-round">
                        @else
                            <img src="{{asset('wap/bootstrap/images/test/head_logo.jpg')}}"
                                 class="aui-img-round">
                        @endif
                        <span class="vert" style="color:#666666">{{$topic->title}}</span></div>
                    <div  style="text-align:right; float:right">
                        <img src="{{asset('wap/new/huzhu/images/guanzhu.png')}}" style="margin-right:0.5em">
                        <small><span class="vert">共</span><span class="vert">{{$topic->reply_count}}</span><span class="vert">条回答</span></small></div>
                </div>
                <div class="each_con" style="clear:both"> {{ $topic->excerpt }}</div>
            </a><hr style=" border:none;border-bottom:1px dashed #CCCCCC; height:1em"/>
        </li>
        @endforeach
    </ul>

</div>
@endif
<script type="text/javascript" src="{{asset('layui/lib/layui/layui.all.js')}}"></script>
<script>
    layui.use('upload', function () {
        var $ = layui.jquery
            , upload = layui.upload;
        //多图片上传
        upload.render({
            elem: '#test2'
            , url: '{{ route('wap.upload_image') }}'
            , data: {_token: '{{ csrf_token() }}'}
            , multiple: true
            , before: function (obj) {
                //预读本地文件示例，不支持ie8
                obj.preview(function (index, file, result) {
                    layer.msg('图片上传中...', {
                        icon: 16,
                        shade: 0.01,
                        time: 0
                    });
                    var html = '';
                    html += '<div class="layui-inline">';
//
                    html += '<img src="' + result + '" alt="' + file.name + '" class="notes-image" style="width: 92px;height: 92px;margin: 0 10px 10px 0;">';
//
                    html += '</div>';
                    $('#demo2').append(html)
                });
            }
            , done: function (res) {
                layer.close(layer.msg());//关闭上传提示窗口
                $('#demo2').append('<input value="' + res.file_path + '" type="hidden" name="image[]">');
                //上传完毕
            }
        });
    });
</script>
</body>
</html>
