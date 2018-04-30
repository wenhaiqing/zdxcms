<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="Description" content="红色E站">
    <meta name="keywords" content="吕梁 红色E站">
    <link rel="stylesheet" type="text/css" href="{{asset('wap/bootstrap/css/myindex.css')}}">
    <title>红色E站--首页</title>
    <style type="text/css">
        .aui-tips {
            padding: 0 0.75rem;
            width: 100%;
            z-index: 99;
            height: 1.9rem;
            line-height: 1.9rem;
            position: relative;
            background-color: rgba(0,0,0,.6);
            color: #ffffff;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            -webkit-align-items: center;
            align-items: center;
        }
        .aui-iconfont {
            position: relative;
            font-family: "aui_iconfont" !important;
            font-size: 0.7rem;
            font-style: normal;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .aui-tips .aui-tips-title {
            padding: 0 0.5rem;
            font-size: 0.7rem;
            position: relative;
            max-width: 100%;
        }
    </style>
</head>
<body>
@if($member->if_out == 1)
<div class="aui-tips aui-margin-b-15" id="tips-1">
    <i class="aui-iconfont aui-icon-info"></i>
    <div class="aui-tips-title">消息提示条消息提示条消息提示</div>
    <i class="aui-iconfont aui-icon-close"></i>
</div>
@endif

<table class="mytab">
    <tr>
        <td rowspan="2" class="mylogo"><a href="">
                @if($member->avatar)
                    <img src="{{$member->avatar}}"/>
                @else
                    <img src="{{asset('wap/bootstrap/images/test/head_logo.jpg')}}"/>
                @endif
            </a></td>
        <td class="mypsn"><span class="myname">{{$member->name}}</span></td>
        {{--<td  rowspan="2"  class="gomore"><a href="" style="color:#CCCCCC"><img src="" width="30" /></a></td>--}}
    </tr>
    <tr>
        <td class="zhibu">所属党支部:{{$member->user->name}}</td>
    </tr>
</table>

<div class="self">
    <div class=" clear myinfo">
        {{--<a href=""><div class="myjifen">我的学分<span>86</span><span>分</span></div></a>--}}
        {{--<a href=""><div class="mymsg">我的消息<span>100</span><span>条</span></div></a>--}}
    </div>
</div>

<div class="clear column2">
    <div class="col2con">
        <a href="">
            <div class="col2con_l">
                <a href="{{route('wap.notice')}}" target="_self">
                    <div class="col2icon">
                        <img src="{{asset('wap/bootstrap/images/lldj/logo1.png')}}"/>
                    </div>
                    <div class="col2con_con">
                        <span style=" color:#eb2121">通知公告</span>
                        <p>最新通知公告</p>
                    </div>
                </a>

            </div>
        </a>
        <a href="">
            <div class="col2con_l">
                <a href="" target="_self">
                    <div class="col2icon">
                        <img src="{{asset('wap/bootstrap/images/lldj/ztjy.png')}}"/>
                    </div>
                    <div class="col2con_con">

                        <span style=" color:#eb2121">专题教育</span>

                        <p>专题学习中心</p>
                    </div>
                </a>
            </div>
        </a>
        <a href="">
            <div class="col2con_l">
                <a href="{{route('wap.videos')}}" target="_self">
                    <div class="col2icon">
                        <img src="{{asset('wap/bootstrap/images/lldj/logo2.png')}}"/>
                    </div>
                    <div class="col2con_con">
                        <span style=" color:#eb2121">在线学习</span>
                        <p>视频随时学</p>
                    </div>
                </a>
            </div>
        </a>
        <a href="">
            <div class="col2con_l">
                <a href="{{route('wap.themed')}}" target="_self">
                    <div class="col2icon">
                        <img src="{{asset('wap/bootstrap/images/lldj/logo3.png')}}"/>
                    </div>
                    <div class="col2con_con">
                        <span style=" color:#eb2121">主题党日</span>
                        <p>党在我心中</p>
                    </div>
                </a>
            </div>
        </a>
        <a href="">
            <div class="col2con_l">
                <a href="{{route('wap.meetings')}}" target="_self">
                    <div class="col2icon">
                        <img src="{{asset('wap/bootstrap/images/lldj/logo5.png')}}"/>
                    </div>
                    <div class="col2con_con">
                        <span style=" color:#eb2121">三会一课</span>
                        <p>组织生活进行时</p>
                    </div>
                </a>
            </div>
        </a>
        <a href="">
            <div class="col2con_l">
                <a href="{{route('wap.topic_create')}}" target="_self">
                    <div class="col2icon">
                        <img src="{{asset('wap/bootstrap/images/lldj/bfhz.png')}}"/>
                    </div>
                    <div class="col2con_con">
                        <span style=" color:#eb2121">互助中心</span>
                        <p>欢迎交流互动</p>
                    </div>
                </a>
            </div>
        </a>
        <a href="">
            <div class="col2con_l">
                <a href="{:U('yanweiming')}" target="_self">
                    <div class="col2icon">
                        <img src="{{asset('wap/bootstrap/images/lldj/wmfw.png')}}"/>
                    </div>
                    <div class="col2con_con">
                        <span style=" color:#eb2121">为民服务</span>
                        <p>便民、为民</p>
                    </div>
                </a>
            </div>
        </a>
        <a href="">
            <div class="col2con_l">
                <a href="{{route('wap.center')}}" target="_self">
                    <div class="col2icon">
                        <img src="{{asset('wap/bootstrap/images/lldj/logo6.png')}}"/>
                    </div>
                    <div class="col2con_con">
                        <span style=" color:#eb2121">我的信息</span>
                        <p>党组织关系流转</p>
                    </div>
                </a>
            </div>
        </a>
    </div>
</div>
<div class="qiandao clear"><a href="{{route('wap.myqiandao')}}"><img src="{{asset('wap/bootstrap/images/lldj/qd.png')}}"></a></div>
</body>
</html>
