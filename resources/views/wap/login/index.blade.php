@extends('wap.layouts._header')

@section('content')
<header class="aui-bar aui-bar-nav" id="header">
    <div class="aui-title">登录</div>
</header>
<section class="aui-content aui-margin-t-15">
    <form class="form-signin" action="{{route('login.create')}}" method="POST" role="form">
        {{ csrf_field() }}
    <ul class="aui-list aui-form-list">
        <li class="aui-list-item">
            <div class="aui-list-item-inner">
                <div class="aui-list-item-label aui-border-r color-orange" style="font-size:14px;">
                    手机号 <small class="aui-margin-l-5 aui-text-warning">+86</small>
                </div>
                <div class="aui-list-item-input aui-padded-l-10">
                    <input type="number"  style="font-size:14px;" pattern="[0-9]*" placeholder="输入手机号" name="mobile" id="mobile" value="{{old('mobile')}}" >
                </div>
            </div>
        </li>
        <li class="aui-list-item">
            <div class="aui-list-item-inner">
                <div class="aui-list-item-label aui-border-r color-orange"  style="font-size:14px;">
                    密码 <small class="aui-margin-l-5 aui-text-warning"></small>
                </div>
                <div class="aui-list-item-input aui-padded-l-10">
                    <input type="password"  style="font-size:14px;" placeholder="请输入密码" name="password" id="password" >
                </div>
            </div>
        </li>
    </ul>
        <section class="aui-content-padded">
            <button class="aui-btn aui-btn-block aui-btn-sm "   style="background-color: #76BE0E" tapmode type="submit" >登录</button>
            <a class="aui-btn aui-btn-block aui-btn-sm" style="background-color: #FE6367;margin-top:10px;color:#FFF;" href="{{route('wap.lmap')}}">立即注册</a>
        </section>
    </form>
</section>

@stop
@section('js')
<script type="text/javascript" src="{{asset('layui/lib/layui/layui.all.js')}}"></script>
@include(getThemeView('layouts._paginate'),[ 'count' => 0, ])
@stop
