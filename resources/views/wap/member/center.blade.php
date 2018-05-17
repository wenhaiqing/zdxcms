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
        <div class="aui-pull-left aui-btn" tapmode onclick="window.history.go(-1);">
            <span class="aui-iconfont aui-icon-left"></span>
        </div>
        <div class="aui-title">个人中心</div>
    </header>
    @include('flash::message')
    <section class="aui-content bg-white aui-margin-b-15">
        <div class="aui-list aui-media-list aui-list-noborder aui-bg-info user-info">
            <div class="aui-list-item aui-list-item-middle">
                <div class="aui-media-list-item-inner ">
                    <div class="aui-list-item-media" id="img_test1" style="width:3rem;">
                        @if($member->avatar)
                            <img src="{{$member->avatar}}" class="aui-img-round demo1"/>
                        @else
                            <img src="{{asset('wap/bootstrap/images/test/head_logo.jpg')}}"
                                 class="aui-img-round demo1"/>
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
                    <a href="{{route('wap.mytopic')}}">
                        <big class="label-cont aui-font-size-16 aui-text-danger">{{$member->topic->count()}}</big>
                        <div class="aui-grid-label aui-font-size-12">参与话题</div>
                    </a>
                </div>
                <div class="aui-col-xs-3">
                    <a href="{{route('wap.myreply')}}">
                        <big class="label-cont aui-font-size-16 aui-text-danger">{{$member->replies->count()}}</big>
                        <div class="aui-grid-label aui-font-size-12">参与回复</div>
                    </a>
                </div>
                <div class="aui-col-xs-3">
                    <a href="{{route('wap.today_myjifen')}}">
                        <big class="label-cont aui-font-size-14 aui-text-danger">{{$today_jifen}}</big>
                        <div class="aui-grid-label aui-font-size-12">今日积分</div>
                    </a>
                </div>
                <div class="aui-col-xs-3">
                    <a href="{{route('wap.myjifen')}}">
                        <big class="label-cont aui-font-size-14 aui-text-danger">{{$member->jifen}}</big>
                        <div class="aui-grid-label aui-font-size-12">积分总计</div>
                    </a>
                </div>


            </div>
        </div>
    </section>
    <section class="aui-content bg-white aui-margin-b-15">
        <div class=" aui-grid aui-padded-b-15 aui-padded-t-15">
            <div class="aui-row">
                <div class="aui-col-xs-3">
                    <a href="{{route('wap.myqianyi')}}">
                        <div class="label-icon aui-bg-danger"><i class=" aui-iconfont aui-icon-phone"></i></div>
                        <div class="aui-grid-label aui-font-size-12">申请迁党</div>
                    </a>
                </div>
                <div class="aui-col-xs-3">
                    <a href="{{route('wap.myvideo')}}">
                        <div class="label-icon aui-bg-warning"><i class=" aui-iconfont aui-icon-comment"></i></div>
                        <div class="aui-grid-label aui-font-size-12">视频学习</div>
                    </a>
                </div>
                <div class="aui-col-xs-3">
                    <a href="{{route('wap.myhistory')}}">
                        <div class="label-icon aui-bg-info"><i class=" aui-iconfont aui-icon-paper"></i></div>
                        <div class="aui-grid-label aui-font-size-12">我的足迹</div>
                    </a>
                </div>
                <div class="aui-col-xs-3">

                    <a href="{{route('wap.mythemed')}}">
                        <div class="label-icon aui-bg-danger"><i class=" aui-iconfont aui-icon-flag"></i></div>
                        <div class="aui-grid-label aui-font-size-12">主题学习</div>
                    </a>
                </div>
            </div>
        </div>
        <div class=" aui-grid aui-padded-b-15 aui-padded-t-15 aui-border-t">
            <div class="aui-row">
                <div class="aui-col-xs-3">
                    <a href="{{route('wap.bind_wechat')}}">
                        <div class="label-icon aui-bg-info"><i class=" aui-iconfont aui-icon-my"></i></div>
                        <div class="aui-grid-label aui-font-size-12">绑定微信</div>
                    </a>
                </div>
                <div class="aui-col-xs-3">
                    <a href="{{route('wap.mymeeting')}}">
                        <div class="label-icon aui-bg-success"><i class=" aui-iconfont aui-icon-pencil"></i></div>
                        <div class="aui-grid-label aui-font-size-12">三会一课</div>
                    </a>
                </div>


                <div class="aui-col-xs-3">
                    <a href="{{route('wap.member_active')}}">
                        <div class="label-icon aui-bg-danger"><i class=" aui-iconfont aui-icon-laud"></i></div>
                        <div class="aui-grid-label aui-font-size-12">活跃党员</div>
                    </a>
                </div>

                <div class="aui-col-xs-3">
                    <a href="{{route('wap.user_active')}}">
                        <div class="label-icon aui-bg-success"><i class=" aui-iconfont aui-icon-star"></i></div>
                        <div class="aui-grid-label aui-font-size-12">活跃支部</div>
                    </a>
                </div>
            </div>
        </div>
        <div class=" aui-grid aui-padded-b-15 aui-padded-t-15 aui-border-t">
            <div class="aui-row">
                @if($member->if_admin == 0)
                <div class="aui-col-xs-3">
                    <a href="{{route('wap.bind_admin')}}">
                        <div class="label-icon aui-bg-info"><i class=" aui-iconfont aui-icon-gear"></i></div>
                        <div class="aui-grid-label aui-font-size-12">绑定后台管理员</div>
                    </a>
                </div>
                    @else
                    <div class="aui-col-xs-3">
                        <a href="{{route('wap.untie_admin')}}">
                            <div class="label-icon aui-bg-info"><i class=" aui-iconfont aui-icon-gear"></i></div>
                            <div class="aui-grid-label aui-font-size-12">解绑后台管理员</div>
                        </a>
                    </div>
                    <div class="aui-col-xs-3">
                        <a href="{{route('wap.admin_themed_list')}}">
                            <div class="label-icon aui-bg-info"><i class=" aui-iconfont aui-icon-flag"></i></div>
                            <div class="aui-grid-label aui-font-size-12">管理主题党日</div>
                        </a>
                    </div>
                    <div class="aui-col-xs-3">
                        <a href="{{route('wap.admin_meeting_list')}}">
                            <div class="label-icon aui-bg-info"><i class=" aui-iconfont aui-icon-pencil"></i></div>
                            <div class="aui-grid-label aui-font-size-12">管理三会一课</div>
                        </a>
                    </div>
                    <div class="aui-col-xs-3">
                        <a href="{{route('wap.admin_notice_list')}}">
                            <div class="label-icon aui-bg-info"><i class=" aui-iconfont aui-icon-info"></i></div>
                            <div class="aui-grid-label aui-font-size-12">管理通知</div>
                        </a>
                    </div>
                @endif
            </div>
        </div>

    </section>
    <p><a href="{{route('wap.logout')}}"><div class="aui-btn aui-btn-block">退出登录</div></p></a>

@stop

@section('js')
    <script>
        layui.use('upload', function () {
            var $ = layui.jquery
                , upload = layui.upload;
            //普通图片上传
            var uploadInst = upload.render({
                elem: '#img_test1'
                , url: '{{ route('wap.member_avatar') }}'
                , data: {_token: '{{ csrf_token() }}'}
                , before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        $('.demo1').attr('src', result); //图片链接（base64）
                    });
                }
                , done: function (res) {
                    //如果上传失败
                    if (!res.success) {
                        return layer.msg(res.msg);
                    }
                    $("#cover").attr('value', res.file_path);
                    //上传成功
                }
                , error: function () {
                    //演示失败状态，并实现重传
                    var demoText = $('#demoText');
                    demoText.html('<span style="color: #FF5722;">{{trans('global.upload_error')}}</span> <a class="layui-btn layui-btn-mini demo-reload">{{trans('global.restart')}}</a>');
                    demoText.find('.demo-reload').on('click', function () {
                        uploadInst.upload();
                    });
                }
            });

        })
    </script>

@stop