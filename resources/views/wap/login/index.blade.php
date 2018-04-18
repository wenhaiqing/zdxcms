<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录页面</title>

    <link href="{{asset('wap/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('wap/bootstrap/css/signin.css')}}" rel="stylesheet">

</head>

<body>

<div class="signin">
    <div class="signin-head"><img src="{{asset('wap/bootstrap/images/test/head_logo.jpg')}}" style="height: 120px;" alt="" class="img-circle"></div>
    <form class="form-signin" action="{{route('login.create')}}" method="POST" role="form">
        {{ csrf_field() }}
        <input type="text" name="mobile" class="form-control" placeholder="手机号" required autofocus />
        <input type="password" name="password" class="form-control" placeholder="密码" required />
        <button class="btn btn-lg btn-warning btn-block" type="submit">登录</button>
        {{--<a class="btn btn-lg btn-warning btn-block" href="{{route('wap.register')}}">立即注册</a>--}}
        <label class="checkbox">
            <input type="checkbox" value="remember-me"> 记住我
            <a class="btn btn-primary btn-sm" style="float: right" href="{{route('wap.lmap')}}">立即注册</a>
        </label>
    </form>
</div>
<script type="text/javascript" src="{{asset('layui/lib/layui/layui.all.js')}}"></script>
@include(getThemeView('layouts._paginate'),[ 'count' => 0, ])
</body>
</html>
