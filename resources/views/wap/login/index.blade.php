<!DOCTYPE html PUBLIC "-/W3C/DTD XHTML 1.0 Transitional/EN" "http:/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http:/www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>吕梁共产党员党建云</title>
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
        .login_btn {
            width: 100%;
            display: block;
            padding: 3% 0;
            background: #ffffff;
            border: 0;
            font-size: 1em;
            font-family: "Microsoft YaHei";
            color: #374782;
            -webkit-box-shadow: #ff9b90 0px 0px 20px;
            -moz-box-shadow: #ff9b90 0px 0px 20px;
            box-shadow: #ff9b90 0px 0px 20px;
            text-align: center;
            margin-bottom: 1em;
        }
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
                <a href="{{route('wap.lmap')}}"><lable>忘记密码?点击找回</lable></a>
            </div>
            <!--<a href="newPassword.html">忘记密码</a>-->            </div>
        <button class="login_btn" type="submit">登&nbsp;&nbsp;录</button>
        <a class="login_btn"  href="{{route('wap.lmap')}}">注&nbsp;&nbsp;册</a>
        <a class="login_btn"  href="{{route('wap.index_youke')}}">游&nbsp;&nbsp;客</a>
    </form>



    <div style="display:none"></div>
    <div class="copyright"></div>
</div>

</body>
</html>