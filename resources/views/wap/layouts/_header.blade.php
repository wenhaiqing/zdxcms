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
    <link rel="stylesheet" href="{{asset('layui/lib/layui/css/layui.css')}}" media="all" />
    <link href="{{asset('wap/bootstrap/css/aui.css')}}" rel="stylesheet">


    <script type="text/javascript" src="{{asset('layui/lib/layui/layui.all.js')}}"></script>
    <!-- Styles -->
    <style>
        .aui-searchbar {
            background: transparent;
        }

        .aui-bar-nav .aui-searchbar-input {
            background-color: #ffffff;
        }

        .aui-bar-light .aui-searchbar-input {
            background-color: #f5f5f5;
        }

             .aui-list .aui-list-item-inner {    position: relative;
                 min-height: 2rem;
                 padding-right: 0.75rem;
                 width: 100%;
                 -webkit-box-sizing: border-box;
                 box-sizing: border-box;
                 display: -webkit-box;
                 display: -webkit-flex;
                 display: flex;
                 -webkit-box-flex: 1;
                 -webkit-box-pack: justify;
                 -webkit-justify-content: space-between;
                 justify-content: space-between;
                 -webkit-box-align: center;
                 -webkit-align-items: center;
                 align-items: center;
                 border-left: #03a9f4 3px solid;
                 margin: 0.5em 0;
                 padding-left: 0.75rem;}
        .layui-laypage .layui-laypage-curr .layui-laypage-em{background-color: #03a9f4;}
        #paginate-render{
            padding-left:0;
            text-align: center;
        }


    </style>
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
