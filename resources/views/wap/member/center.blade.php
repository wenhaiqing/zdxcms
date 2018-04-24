@extends('wap.layouts._header')

@section('css')
    <style type="text/css">
        .text-white {
            color: #ffffff !important;
        }
        .text-light {
            color: #999 !important;
        }
        .bg-white {
            background-color: #ffffff;
        }
        .aui-grid [class*=aui-col-] {
            padding: 0;
        }
        .user-info {
            width: 150%;
            position: relative;
            left: -25%;
            padding-left: 25%;
            border-bottom-left-radius: 50%;
            border-bottom-right-radius: 50%;
            padding-bottom: 1.5rem;
        }

        .aui-grid .aui-dot {
            top: 0rem;
        }
        .label-cont {
            display: block;
            height: 1.8rem;
            line-height: 1.8rem;
        }
        .label-icon {
            display: block;
            width: 1.8rem;
            height: 1.8rem;
            border-radius: 50%;
            margin: 0 auto;
            line-height: 1.8rem;
            text-align: center;
        }
        .label-cont .aui-iconfont {
            font-size: 1rem;
        }
        .label-icon .aui-iconfont {
            color: #ffffff;
            font-size: 0.8rem;
        }
        .font-size-26 {
            font-size: 1.3rem !important;
        }
        .aui-grid-label {
            color: #666 !important;
        }
    </style>
    @stop

@section('content')
    <header class="aui-bar aui-bar-nav" id="aui-header">
        <a class="aui-btn aui-pull-left" tapmode onclick="closeWin()">
            <span class="aui-iconfont aui-icon-left"></span>
        </a>
        <div class="aui-title">个人中心</div>
    </header>

    <section class="aui-content bg-white aui-margin-b-15">
        <div class="aui-list aui-media-list aui-list-noborder aui-bg-info user-info">
            <div class="aui-list-item aui-list-item-middle">
                <div class="aui-media-list-item-inner ">
                    <div class="aui-list-item-media" style="width:3rem;">
                        @if($member->avatar)
                            <img src="{{$member->avatar}}" class="aui-img-round"  />
                        @else
                            <img src="{{asset('wap/bootstrap/images/test/head_logo.jpg')}}" class="aui-img-round"  />
                        @endif
                    </div>
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-text text-white aui-font-size-18">{{$member->name}}</div>
                        <div class="aui-list-item-text text-white">
                            <div><i class="aui-iconfont aui-icon-mobile aui-font-size-14"></i>{{$member->mobile}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" aui-grid aui-padded-b-15 aui-padded-t-15">
            <div class="aui-row">
                <div class="aui-col-xs-3">
                    <big class="label-cont aui-font-size-16 aui-text-danger">23</big>
                    <div class="aui-grid-label aui-font-size-12">视频学习</div>
                </div>
                <div class="aui-col-xs-3">
                    <big class="label-cont aui-font-size-16 aui-text-danger">1</big>
                    <div class="aui-grid-label aui-font-size-12">主题学习</div>
                </div>
                <div class="aui-col-xs-3">
                    <big class="label-cont aui-font-size-14 aui-text-danger">100</big>
                    <div class="aui-grid-label aui-font-size-12">积分</div>
                </div>
                <div class="aui-col-xs-3">
                    <div class="label-icon aui-bg-danger"><i class=" aui-iconfont aui-icon-phone"></i></div>
                    <div class="aui-grid-label aui-font-size-12">申请迁党</div>
                </div>
            </div>
        </div>
    </section>
    <section class="aui-content bg-white aui-margin-b-15">
        <div class=" aui-grid aui-padded-b-15 aui-padded-t-15">
            <div class="aui-row">
                <div class="aui-col-xs-3">
                    <big class="label-cont aui-font-size-16 aui-text-danger">23</big>
                    <div class="aui-grid-label aui-font-size-12">我的话题</div>
                </div>
                <div class="aui-col-xs-3">
                    <big class="label-cont aui-font-size-16 aui-text-danger">1</big>
                    <div class="aui-grid-label aui-font-size-12">我的回复</div>
                </div>
                <div class="aui-col-xs-3">
                    <big class="label-cont aui-font-size-14 aui-text-danger">100</big>
                    <div class="aui-grid-label aui-font-size-12">浏览记录</div>
                </div>
                <div class="aui-col-xs-3">
                    <div class="label-icon aui-bg-danger"><i class=" aui-iconfont aui-icon-flag"></i></div>
                    <div class="aui-grid-label aui-font-size-12">活跃党员</div>
                </div>
            </div>
        </div>
    </section>
    <section class="aui-content">
        <div class="aui-card-list">
            <div class="aui-card-list-header">
                <div class="aui-font-size-14">问答动态</div>
                <i class="aui-iconfont aui-icon-close"></i>
            </div>
            <div class="aui-card-list-content">
                <ul class="aui-list aui-media-list">
                    <li class="aui-list-item">
                        <div class="aui-media-list-item-inner">
                            <div class="aui-list-item-media aui-padded-r-10" style="width: 1.5rem;">
                                <img src="../image/demo5.png" class="aui-img-round" >
                            </div>
                            <div class="aui-list-item-inner">
                                <div class="aui-list-item-text">
                                    <div class="aui-list-item-title aui-font-size-12 text-light">有人向您提问</div>
                                </div>
                                <div class="aui-list-item-text aui-font-size-14" style="color:#333;padding-top: 0.4rem;">
                                    手机屏幕发黄，特别黄，怎么回事
                                </div>
                                <div class="aui-list-item-text aui-font-size-12 text-light">
                                    共9条回答
                                </div>
                            </div>
                            <div class="aui-list-item-media aui-padded-r-10" style="width: 4rem;">
                                <img src="http://img10.360buyimg.com/n1/s450x450_jfs/t4276/257/2416766721/125228/ba72a107/58d1d078N20e18b62.jpg" />
                            </div>
                        </div>
                    </li>
                    <li class="aui-list-item">
                        <div class="aui-media-list-item-inner">
                            <div class="aui-list-item-media aui-padded-r-10" style="width: 1.5rem;">
                                <img src="../image/demo5.png" class="aui-img-round" >
                            </div>
                            <div class="aui-list-item-inner">
                                <div class="aui-list-item-text">
                                    <div class="aui-list-item-title aui-font-size-12 text-light">有人向您提问</div>
                                </div>
                                <div class="aui-list-item-text aui-font-size-14" style="color:#333;padding-top: 0.4rem;">
                                    大家对中国红有什么看法呢
                                </div>
                                <div class="aui-list-item-text aui-font-size-12 text-light">
                                    共9条回答
                                </div>
                            </div>
                            <div class="aui-list-item-media aui-padded-r-10" style="width: 4rem;">
                                <img src="http://img10.360buyimg.com/n1/s450x450_jfs/t4276/257/2416766721/125228/ba72a107/58d1d078N20e18b62.jpg" />
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="aui-card-list-footer aui-text-center">
                查看更多
            </div>
        </div>
    </section>
    @stop