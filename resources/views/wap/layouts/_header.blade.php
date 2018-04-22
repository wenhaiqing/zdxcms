<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'zdxcms') }}</title>
    <link href="{{asset('wap/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('wap/bootstrap/css/aui.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('layui/lib/layui/css/layui.css')}}" media="all" />
    <script type="text/javascript" src="{{asset('layui/lib/layui/layui.all.js')}}"></script>
    <!-- Styles -->

    @yield('css')
</head>
<body>

    @yield('content')

<!-- Scripts -->
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
@yield('js')
</body>
</html>
