<!DOCTYPE html PUBLIC "-/W3C/DTD XHTML 1.0 Transitional/EN" "http:/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http:/www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>吕梁共产党员党建云-会员注册</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="format-detection" content="telephone=no"/>
    <link href="{{asset('wap/new/css/list.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('wap/new/css/register.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('wap/new/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{asset('wap/new/js/jquery.min.js')}}"></script>
    <style type="text/css">
        body {
            background: url(/wap/new/images/bg-2.png);
            background-repeat: repeat;
            color: #444444
        }
    </style>
</head>
<body class="news">

<div class="t-main"><img src="{{asset('wap/new/images/register_top.png')}}" style="vertical-align: middle;"></div>
<div class="t-main1">
    <form action="{{route('register.create')}}" method="POST" id="form1">
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{$user_id}}">
        <input type="hidden" name="status" value="0">
        <input type="hidden" name="jifen" value="0">
        <div class="t-main1-list t-line">
            <i class="fa fa-user-o fa-lg fa-color fa-width"></i>
            <input type="text" required class="name-input name" id="name"
                   name="name" placeholder="请输入您的姓名" value="{{ old('name') }}"/>
            <span id="error1" style="display:inline;color:red;font-size: 12px"></span>
        </div>

        <div class="t-main1-list t-line">
            <i class="fa fa-mobile-phone fa-lg fa-color fa-width"></i>
            <input type="text" required class="name-input mobile"
                   placeholder="请输入您的手机号码" id="mobile"
                   name="mobile" value="{{old('mobile')}}" maxlength=""
                   pattern="[0-9]*"/><span id="error2"
                                           style="display:inline;color:red;font-size: 12px"></span>
        </div>
        <div class="t-main1-list t-line">
            <i class="fa fa-key fa-lg fa-color fa-width"></i>
            <input type="password" required class="name-input password"
                   id="password" name="password" placeholder="请输入密码"
                   value=""/><span id="error3"
                                   style="display:inline;color:red;font-size: 12px"></span>
        </div>
        <div class="t-main1-list t-line">
            <i class="fa fa-key fa-lg fa-color fa-width"></i>
            <input type="password" required class="name-input password"
                   id="confirm_password" name="confirm_password" placeholder="请确认密码"
                   value=""/><span id="error3"
                                   style="display:inline;color:red;font-size: 12px"></span>
        </div>
        <div class="t-main1-list t-line">
            <i class="fa fa-address-card-o fa-lg fa-color fa-width"></i>
            <input type="text" class="name-input idcard"
                   id="cardnum" required name="cardnum"
                   placeholder="请输入身份证号码"
                   value="{{ old('cardnum') }}"><span
                    id="error5" style="display:inline;color:red;font-size: 12px"></span>
        </div>
        <div class="t-main1-list t-line aa">
            <i class="fa fa-intersex fa-lg fa-color fa-width "></i>
            <input type="radio" required class="sex" name="sex" value="0"
                   id="sex_0" style="margin-left: 1em;"/>男&nbsp;&nbsp;&nbsp;<input
                    type="radio" class="sex" name="sex" value="1" id="sex_1" style="margin-left: 1em;"/> 女

        </div>
        <div class="t-main1-list t-line">
            <i class="fa fa-user-circle-o fa-lg fa-color fa-width"></i>
            <input type="text" required class="name-input mz" id="mz"
                   name="nation" placeholder="民族"
                   value="{{ old('nation') }}"/><span
                    id="error6"
                    style="display:inline;color:red;font-size: 12px"></span>
        </div>


        <div class="t-main1-list t-line">
            <i class="fa fa-camera-retro fa-lg fa-color fa-width"></i>
            <input type="text" required id="test1" name="joindang_time"
                   class="name-input addtime"
                   placeholder="请选择入党日期"/>
        </div>
        <div class="t-main1-list t-line">
            <i class="fa fa-address-card-o fa-lg fa-color fa-width "></i>
            <input type="text" required id="record" name="record"
                   class="name-input addtime"
                   placeholder="请输入学历"/>&nbsp;
        </div>
        <div class="t-main1-list t-line">
            <i class="fa fa-bank fa-lg fa-color fa-width"></i>
            <input type="radio" required class="sex" name="if_dang" value="0"
                   id="sex_0" style="margin-left: 1em;"/>正式党员&nbsp;&nbsp;&nbsp;<input
                    type="radio" class="sex" name="if_dang" value="1" id="sex_1" style="margin-left: 1em;"/> 预备党员

        </div>
        <div class="t-main1-list t-line">
            <i class="fa fa-bank fa-lg fa-color fa-width"></i>
            <input type="radio" required class="sex" name="if_movedang" value="0"
                   id="sex_0" style="margin-left: 1em;"/>是&nbsp;&nbsp;&nbsp;<input
                    type="radio" class="sex" name="if_movedang" value="1" id="sex_1" style="margin-left: 1em;"/> 否
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="error8" style="display:inline;">流动党员</span>
        </div>

    </form>
    <br/><br/>
    <div class="subbtn" onclick="tijiao();">提交</div>
</div>

<script type="text/javascript" src="{{asset('layui/lib/layui/layui.all.js')}}"></script>
@include(getThemeView('layouts._paginate'),[ 'count' => 0, ])
<script>
    layui.laydate.render({
        elem: '#test1'
    });

    function tijiao() {
//        var name = $("#name").val();
//        if (!name){
//            layer.alert('姓名必填');return;
//        }
//        var nation = $("#nation").val();
//        if (!nation){
//            layer.alert('民族必填');return;
//        }
//        var record = $("#record").val();
//        if (!record){
//            layer.alert('学历必填');return;
//        }
//        var joindang_time = $("#test1").val();
//        if (!joindang_time){
//            layer.alert('入党时间必填');return;
//        }

        var password = $("#password").val();
        var confirm_password = $("#confirm_password").val();
        if (password !== confirm_password){
            layer.alert('俩次输入密码不一致');
            return;
        }
        form1.submit();
    }
</script>

<!--input有默认值，且为灰色，点击后默认值消失，输入值变为黑色-->

</body>
</html>