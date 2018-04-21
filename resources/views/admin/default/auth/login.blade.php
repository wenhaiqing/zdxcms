<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <title>登录 - {{ config('app.name', 'ZdxCms')  }}</title>
  <meta name="renderer" content="webkit">
	<meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="apple-mobile-web-app-status-bar-style" content="black"> 
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="format-detection" content="telephone=no">
  <link rel="stylesheet" href="{{asset('layui/lib/layui/css/layui.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('layui/css/pageDemo/login/login1.css')}}"/>
	<script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token()
        ]) !!};
	</script>
</head>

<body>
<div class="login">
	    <h1>{{ config('app.name') }}</h1>
	    <form class="layui-form" method="POST" action="{{ route('login') }}">
			{{ csrf_field() }}
	    	<div class="layui-form-item">
				<input id="name" type="text" name="name" lay-verify="required" autocomplete="off" placeholder="用户名" value="{{ old('name') }}" autofocus class="layui-input">
		    </div>
		    <div class="layui-form-item">
				<input type="password" name="password" lay-verify="pass" autocomplete="off" placeholder="密码" class="layui-input">
		    </div>
		    <div class="layui-form-item form_code">
				<input type="text" name="captcha" lay-verify="required" autocomplete="off" placeholder="验证码"  class="layui-input">
				<div class="code">
					<img class="thumbnail captcha" src="{{ captcha_src('login') }}" onclick="this.src='/captcha/login?'+Math.random()" title="点击图片重新获取验证码" width="116" height="36">
				</div>
		    </div>
			<button type="submit" class="layui-btn login_btn" lay-submit="" lay-filter="login">登录</button>
		</form>
	</div>

</body>

<script src="{{asset('layui/lib/layui/layui.all.js')}}"></script>
<script>

</script>
@if (count($errors) > 0)
	<script> layer.alert('@foreach ($errors->all() as $error) {{ $error }} <br /> @endforeach', {icon: 2,time:3000});</script>
@endif

<script>

</script>
</body>
</html>
