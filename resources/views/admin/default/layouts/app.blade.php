<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title', config('app.name', 'ZdxCms')) - {{ config('app.name', 'ZdxCms')  }}</title>
    <link rel="stylesheet" href="{{asset('layui/lib/layui/css/layui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('layui/css/zdx-layui.css')}}" />
    <link rel="shortcut icon" href="favicon.ico" />
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token()
        ]) !!};
    </script>
    <style>
        .logo {
            color: #fff;
            float: left;
            line-height: 60px;
            font-size: 20px;
            padding: 0 25px;
            text-align: center;
            width: 150px;
        }
    </style>

    @yield('styles')
</head>
<body class="layui-layout-body zdx-black-theme">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <a href="#" class="logo">{{config('app.name')}}</a>
        <div class="layui-main">
            <ul class="layui-nav layui-layout-left">
        <div class="layui-nav-item" pc>
            <div id="tp-weather-widget"></div>
            <script>(function(T,h,i,n,k,P,a,g,e){g=function(){P=h.createElement(i);a=h.getElementsByTagName(i)[0];P.src=k;P.charset="utf-8";P.async=1;a.parentNode.insertBefore(P,a)};T["ThinkPageWeatherWidgetObject"]=n;T[n]||(T[n]=function(){(T[n].q=T[n].q||[]).push(arguments)});T[n].l=+new Date();if(T.attachEvent){T.attachEvent("onload",g)}else{T.addEventListener("load",g,false)}}(window,document,"script","tpwidget","//widget.seniverse.com/widget/chameleon.js"))</script>
            <script>tpwidget("init", {
                    "flavor": "slim",
                    "location": "WX4FBXXFKE4F",
                    "geolocation": "enabled",
                    "language": "zh-chs",
                    "unit": "c",
                    "theme": "chameleon",
                    "container": "tp-weather-widget",
                    "bubble": "disabled",
                    "alarmType": "badge",
                    "color": "#FFFFFF",
                    "uid": "U9EC08A15F",
                    "hash": "039da28f5581f4bcb5c799fb4cdfb673"
                });
                tpwidget("show");</script>
        </div>
                <ul>
        </div>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a class="zdx-tab-add" zdx-href="{{ route('notifications.index') }}">通知<span class="layui-badge">{{ Auth::user()->notification_count }}</span></a>
            </li>
            <li class="layui-nav-item">
                <a class="name" href="javascript:;"><i class="layui-icon"></i>主题<span class="layui-nav-more"></span></a>
                <dl class="layui-nav-child layui-anim layui-anim-upbit">
                    <dd>
                        <a skin="zdx-black-theme" class="zdx-theme-skin-switch"  href="javascript:;">低调黑</a>
                    </dd>
                    <dd >
                        <a skin="zdx-blue-theme" class="zdx-theme-skin-switch" href="javascript:;">炫酷蓝</a>
                    </dd>
                    <dd>
                        <a skin="zdx-green-theme" class="zdx-theme-skin-switch"  href="javascript:;">原谅绿</a>
                    </dd>
                </dl>
            </li>
            @guest
                <li class="layui-nav-item"><a href="{{ route('administrator.login') }}">登录</a></li>
                @else
                    <li class="layui-nav-item">
                        <a href="javascript:;">
                            <img src="{{asset('layui/img/1.jpg')}}" class="layui-nav-img" />
                            {{ Auth::user()->name }}
                        </a>
                        <dl class="layui-nav-child">
                            <dd><a class="zdx-tab-add" zdx-href="{{ route('users.edit', Auth::user()->id)  }}">基本资料</a></dd>
                            <dd><a class="zdx-tab-add" zdx-href="{{ route('zdxadmin.password.edit', Auth::user()->id )  }}">修改密码</a></dd>
                            <dd>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </dd>
                        </dl>
                    </li>
                    @endguest
        </ul>
    </div>

    <div class="layui-side zdx-left-menu">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->

            @inject('menuPresenter','App\Presenters\Admin\MenuPresenter')
            <ul class="layui-nav layui-nav-tree" lay-filter="test">
                {!!$menuPresenter->sidebarMenuList($Menu)!!}

            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        @yield('frame')
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © zdxcms version-1.0  github:http://github.com/wenhaiqing
    </div>
</div>
<script src="{{ asset('layui/lib/layui/layui.all.js') }}"></script>
<script>
    // 配置
    layui.config({
        base: '/layui/zdxModules/' // 扩展模块目录
    }).extend({ // 模块别名
        zdxTab: 'zdxTab/zdxTab',
        zdxRightMenu: 'zdxRightMenu/zdxRightMenu',
        zdxFormAll: 'zdxFormAll/zdxFormAll'
    });
    //JavaScript代码区域
    layui.use(['element', 'carousel','zdxTheme', 'zdxTab', 'zdxLayedit', 'zdxRightMenu'], function() {
        var element = layui.element;
        var carousel = layui.carousel; //轮播
        var zdxTab = layui.zdxTab;
        var zdxRightMenu = layui.zdxRightMenu;
        var zdxTheme=layui.zdxTheme;
        $ = layui.jquery;
        // 初始化主题
        zdxTheme.init();
        //初始化轮播
        carousel.render({
            elem: '#test1',
            width: '100%', //设置容器宽度
            interval: 1500,
            height: '500px',
            arrow: 'none', //不显示箭头
            anim: 'fade', //切换动画方式
        });

        // 初始化 动态tab
        zdxTab.init();
        // 右键tab菜单
        zdxRightMenu.init();

    });

</script>
</body>

</html>