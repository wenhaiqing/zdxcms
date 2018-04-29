@extends('wap.layouts._header')

@section('css')
    {{--<link href="{{asset('wap/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">--}}
@stop
@section('content')
    <header class="aui-bar aui-bar-nav" id="header">
        <div class="aui-pull-left aui-btn" tapmode onclick="window.history.go(-1);">
            <span class="aui-iconfont aui-icon-left"></span>
        </div>
        <div class="aui-title">注册</div>
    </header>
    <section class="aui-content aui-margin-t-15">
        <form class="form-signin" action="{{route('register.create')}}" method="POST" role="form">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{$user_id}}">
            <input type="hidden" name="status" value="0">
            <input type="hidden" name="jifen" value="0">
            <ul class="aui-list aui-form-list">
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label aui-border-r color-orange" style="font-size:14px;">
                            用户名
                            <small class="aui-margin-l-5 aui-text-warning"></small>
                        </div>
                        <div class="aui-list-item-input aui-padded-l-10">
                            <input id="name" name="name" required value="{{ old('name') }}" class="form-control"
                                   placeholder="请输入用户名" maxlength="20" type="text">
                        </div>
                    </div>
                </li>
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label aui-border-r color-orange" style="font-size:14px;">
                            手机号
                            <small class="aui-margin-l-5 aui-text-warning">+86</small>
                        </div>
                        <div class="aui-list-item-input aui-padded-l-10">
                            <input type="number" required style="font-size:14px;" pattern="[0-9]*" placeholder="输入手机号"
                                   name="mobile" id="mobile" value="{{old('mobile')}}">
                        </div>
                    </div>
                </li>
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label aui-border-r color-orange" style="font-size:14px;">
                            密码
                            <small class="aui-margin-l-5 aui-text-warning"></small>
                        </div>
                        <div class="aui-list-item-input aui-padded-l-10">
                            <input type="password" required style="font-size:14px;" placeholder="请输入密码" name="password"
                                   id="password">
                        </div>
                    </div>
                </li>
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label aui-border-r color-orange" style="font-size:14px;">
                            民族
                            <small class="aui-margin-l-5 aui-text-warning"></small>
                        </div>
                        <div class="aui-list-item-input aui-padded-l-10">
                            <input type="text" required value="{{ old('nation') }}" style="font-size:14px;" placeholder="请输入民族"
                                   name="nation" id="nation">
                        </div>
                    </div>
                </li>
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label aui-border-r color-orange" style="font-size:14px;">
                            身份证号
                            <small class="aui-margin-l-5 aui-text-warning"></small>
                        </div>
                        <div class="aui-list-item-input aui-padded-l-10">
                            <input id="cardnum" required name="cardnum" value="{{ old('cardnum') }}" class="form-control"
                                   placeholder="请输入身份证号" type="text">
                        </div>
                    </div>
                </li>
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label aui-border-r color-orange" style="font-size:14px;">
                            学历
                            <small class="aui-margin-l-5 aui-text-warning"></small>
                        </div>
                        <div class="aui-list-item-input aui-padded-l-10">
                            <input id="record" required name="record" value="{{ old('record') }}" class="form-control"
                                   placeholder="请输入学历" type="text">
                        </div>
                    </div>
                </li>
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label aui-border-r color-orange" style="font-size:14px;">
                            年龄
                            <small class="aui-margin-l-5 aui-text-warning"></small>
                        </div>
                        <div class="aui-list-item-input aui-padded-l-10">
                            <input id="age" name="age" required value="{{ old('age') }}" class="form-control" placeholder="请输入年龄"
                                   type="number">
                        </div>
                    </div>
                </li>
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label">
                            性别
                        </div>
                        <div class="aui-list-item-input">
                            <label><input type="radio" name="sex" class="aui-radio" value="0" checked>男</label>
                            <label><input type="radio" name="sex" class="aui-radio" value="1">女</label>
                        </div>
                    </div>
                </li>
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label">
                            流动党员
                        </div>
                        <div class="aui-list-item-input">
                            <label><input type="radio" name="if_movedang" class="aui-radio" value="0" checked>否</label>
                            <label><input type="radio" name="if_movedang" class="aui-radio" value="1">是</label>
                        </div>
                    </div>
                </li>
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label">
                            正式党员
                        </div>
                        <div class="aui-list-item-input">
                            <label><input type="radio" name="if_dang" class="aui-radio" value="0" checked>正式党员</label>
                            <label><input type="radio" name="if_dang" class="aui-radio" value="1">预备党员</label>
                        </div>
                    </div>
                </li>
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label">
                            出生日期
                        </div>
                        <input type="text" name="birthday" value="{{ old('birthday') }}" required class="layui-input" id="test1" placeholder="yyyy-MM-dd">
                    </div>

                </li>
            </ul>
            <section class="aui-content-padded">
                <button class="aui-btn aui-btn-block aui-btn-sm " style="background-color: #76BE0E" tapmode
                        type="submit">立即注册
                </button>
            </section>
        </form>
    </section>
@stop

@section('js')
    <script type="text/javascript" src="{{asset('layui/lib/layui/layui.all.js')}}"></script>
    @include(getThemeView('layouts._paginate'),[ 'count' => 0, ])
    <script>
        layui.laydate.render({
            elem: '#test1'
        });
    </script>

@stop