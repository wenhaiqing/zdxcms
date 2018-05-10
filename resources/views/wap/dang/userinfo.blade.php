@extends('wap.layouts._header')

@php
    $users_picture = is_json($userinfo->users_picture) ? json_decode($userinfo->users_picture) : new \stdClass();
@endphp
@section('css')
    <link href="{{asset('wap/bootstrap/css/aui-slide.css')}}" rel="stylesheet">
    <style type="text/css">
        body {
            background: #ffffff;
        }

        .bg-dark {
            background: #333333 !important;
        }

        .aui-slide-node img {
            width: auto;
            height: 100%;
        }
    </style>
@stop
@section('content')
    <header class="aui-bar aui-bar-nav" id="header">
        <div class="aui-pull-left aui-btn" tapmode onclick="window.history.go(-1);">
            <span class="aui-iconfont aui-icon-left"></span>
        </div>
        <div class="aui-title">支部详情</div>
    </header>
    @if(get_json_params($userinfo->users_picture,'0'))
        <div id="aui-slide3">
            <div class="aui-slide-wrap">
                @foreach($users_picture as $index=>$v)
                    <div class="aui-slide-node bg-dark">
                        <img src="{{$v}}"/>
                    </div>
                @endforeach
            </div>
            <div class="aui-slide-page-wrap"><!--分页容器--></div>
        </div>
    @endif
    <div class="aui-content aui-margin-b-15">
        <ul class="aui-list aui-list-in">
            <li class="aui-list-item">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-title">支部类型</div>
                    <div class="aui-list-item-right">
                        <div class="aui-label aui-label-info">@switch($userinfo->users_type)
                                @case(0)软弱涣散@break
                                @case(1)规范建设@break
                                @case(2)创建品牌@break
                            @endswitch
                        </div>
                    </div>
                </div>
            </li>
            {{--<li class="aui-list-item">--}}
            {{--<div class="aui-list-item-inner">--}}
            {{--<div class="aui-list-item-title">成立时间</div>--}}
            {{--<div class="aui-list-item-right">--}}
            {{--<div class="aui-label aui-label-info">{{$userinfo->found_time}}</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</li>--}}
        </ul>
    </div>
    <div class="aui-content aui-margin-b-15">
        <ul class="aui-list aui-media-list">
            <li class="aui-list-item">
                <div class="aui-media-list-item-inner">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-text">
                            <div class="aui-list-item-title">班子成员:</div>
                        </div>
                        <div class="aui-list-item-text aui-ellipsis-2">
                            {{$userinfo->team_members}}
                        </div>
                    </div>
                </div>
            </li>
            <li class="aui-list-item">
                <div class="aui-media-list-item-inner">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-text">
                            <div class="aui-list-item-title">支部简介:</div>
                        </div>
                        <div class="aui-list-item-text aui-ellipsis-2">
                            {{$userinfo->introduction}}
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </div>
    <section class="aui-content-padded">
        @if($list->count())
            <div class="aui-content aui-margin-b-15">
                <ul class="aui-list aui-list-in">
                    @foreach($list as $index=>$v)
                        <li class="aui-list-item">
                            <div class="aui-list-item-inner">
                                <div class="aui-list-item-title">{{$v->name}}</div>
                                <div class="aui-list-item-right">
                                    <div class="aui-label aui-label-info">成员</div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div id="paginate-render"></div>
        @else
            <br/>
            <blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>
        @endif
    </section>

@stop

@section('js')
    @include('wap.layouts._paginate',[ 'count' => $list->total(), ])
    <script type="text/javascript" src="{{asset('wap/bootstrap/js/aui-slide.js')}}"></script>
    <script>
        var slide3 = new auiSlide({
            container: document.getElementById("aui-slide3"),
            // "width":300,
            "height": 240,
            "speed": 500,
            "autoPlay": 3000, //自动播放
            "loop": true,
            "pageShow": true,
            "pageStyle": 'dot',
            'dotPosition': 'center'
        })
        // console.log(slide3.pageCount());
    </script>
@stop