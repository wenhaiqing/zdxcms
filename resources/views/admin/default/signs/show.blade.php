<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>签到</title>
    <link rel="stylesheet" href="{{asset('wap/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('wap/bootstrap/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('wap/bootstrap/css/qiandao_style.css')}}">
    <link href="{{asset('wap/bootstrap/css/aui.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 clearPadding">
            {{--<div class=""><img src="{{asset('wap/bootstrap/images/lldj/qdBanner.jpg')}}" class="img-responsive"></div>--}}

            <div class="calendar">
                <div class="calenbox">
                    <div id="calendar"></div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="maskbox"></div>
<div class="qdbox">
    <div class="text-center text-green font18"><strong>签到成功！</strong></div>
    {{--<div class="text-center pt10">您已经连续签到&nbsp;<span class="text-green">10</span>&nbsp;天</div>--}}
</div>
<script src="{{asset('layui/lib/jquery/jquery-2.1.4.js')}}"></script>
<script src="{{asset('wap/bootstrap/js/calendar.js')}}"></script>
<script src="{{asset('wap/bootstrap/js/aui-toast.js')}}"></script>
<script>
    var member_id;
    member_id = "{{$member_id}}";
    function  signIn(){
        showDefault('loading');
        $.ajax({
            type:'post',
            url:"{{route('wap.qiandao_create')}}",
            data:{},
            dataType:'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                console.log(data);
                toast.hide();
                if(data.code ==1){
                    $(".maskbox").fadeIn();
                    $(".qdbox").fadeIn();
                    $(".maskbox").height($(document).height());
                    window.location.reload();
                }else{
                    showDefault('fail');
                }
            }
        });

    }
    $(".maskbox").click(function(){
        $(".maskbox").fadeOut();
        $(".qdbox").fadeOut();
    });
    $(function(){

        //ajax获取日历json数据
        showDefault('loading');
        $.ajax({
            type:'post',
            url:"{{route('signs.store')}}",
            data:{member_id:member_id},
            dataType:'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                console.log(data);
                toast.hide();
                calUtil.init(data)
            }
        });
//        var signList=[{"signDay":"9"},{"signDay":"11"},{"signDay":"12"},{"signDay":"13"}];
//        calUtil.init(signList);
    });

    function getsign(year,month){
        showDefault('loading');
        $.ajax({
            type:'post',
            url:"{{route('signs.getsign')}}",
            data:{year:year,month:month,member_id:member_id},
            dataType:'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                console.log(data);
                toast.hide();
                calUtil.init(data)
            }
        });
    }

    var toast = new auiToast();
    function showDefault(type){
        switch (type) {
            case "success":
                toast.success({
                    title:"提交成功",
                    duration:2000
                });
                break;
            case "fail":
                toast.fail({
                    title:"提交失败",
                    duration:2000
                });
                break;
            case "custom":
                toast.custom({
                    title:"提交成功",
                    html:'<i class="aui-iconfont aui-icon-laud"></i>',
                    duration:2000
                });
                break;
            case "loading":
                toast.loading({
                    title:"加载中",
                    duration:2000
                },function(ret){

                });
                break;
            default:
                // statements_def
                break;
        }
    }
</script>
</body>
</html>
