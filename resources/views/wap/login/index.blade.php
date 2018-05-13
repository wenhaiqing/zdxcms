<!DOCTYPE html PUBLIC "-/W3C/DTD XHTML 1.0 Transitional/EN" "http:/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http:/www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>吕梁智慧党建云</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no" />
    <link rel="stylesheet" type="text/css" href="{{asset('wap/new/css/public.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('wap/new/css/common.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('wap/new/css/login.css')}}"/>
    <link href="{{asset('wap/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <style type="text/css">
        html{height:100%;}
        body{min-height:100%;}
        body{ background:url(/wap/new/images/register_bg.jpg) no-repeat;background-size:100%;}
    </style>
</head>
<body class="news">

<div class="login_bg">
    <div class=" logo_pos"><img src="{{asset('wap/new/images/logo-1.png')}}" alt="" width=50%/></div>
    <form class="form-signin" action="{{route('login.create')}}" method="POST" role="form">
        {{ csrf_field() }}
        @include('flash::message')
        <div class="usernmb">
            <lable>手机号码：</lable>
            <input type="text" name="mobile" placeholder="请输入手机号码" pattern="[0-9A-Za-z]{6,16}" required/>
        </div>

        <div class="userName">
            <lable>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</lable>
            <input type="password" name="password" placeholder="请输入密码" pattern="[0-9A-Za-z]{6,25}" required/>
        </div>

        <div class="choose_box">
            <div>
                <input type="checkbox" checked="checked" name="checkbox"/>
                <lable>记住用户信息</lable>
            </div>
            <!--<a href="newPassword.html">忘记密码</a>-->            </div>
        <button class="login_btn" type="submit">登&nbsp;&nbsp;录</button>
    </form>



    <div style="display:none"></div>
    <div class="copyright"></div>
</div>

</body>
</html>