@extends('wap.layouts._header')


@section('content')
    <header class="aui-bar aui-bar-nav" id="header">
        <div class="aui-pull-left aui-btn" tapmode onclick="window.history.go(-1);">
            <span class="aui-iconfont aui-icon-left"></span>
        </div>
        <div class="aui-title">我的迁党申请</div>

        <span class="aui-pull-right aui-btn " aui-popup-for="bottom">发起申请</span>

    </header>
    <section class="aui-content-padded">
        @if($qianyi->count())

            @foreach($qianyi as $index=>$value)
                <div class="aui-info aui-margin-t-10 aui-padded-l-10 aui-padded-r-10">
                    <div class="aui-info-item">
                        <span class="aui-margin-l-5">申请内容</span>
                    </div>
                    <div class="aui-info-item">从{{$value->from_user_name}}申请到{{$value->to_user_name}}</div>
                </div>
                <div class="aui-info aui-margin-t-10 aui-padded-l-10 aui-padded-r-10">
                    <div class="aui-info-item">
                        <span class="aui-margin-l-5">申请时间</span>
                    </div>
                    <div class="aui-info-item">{{$value->created_at}}</div>
                </div>
                <div class="aui-info aui-margin-t-10 aui-padded-l-10 aui-padded-r-10">
                    <div class="aui-info-item">
                        <span class="aui-margin-l-5">申请状态</span>
                    </div>
                    <div class="aui-info-item">@switch($value->status)
                            @case(0)已申请 @break
                            @case(1)处理中 @break
                            @case(2)已完成 @break
                        @endswitch</div>
                </div>
                {{--<div class="aui-info aui-margin-t-10 aui-padded-l-10 aui-padded-r-10">--}}
                {{--<div class="aui-info-item">--}}
                {{--<span class="aui-margin-l-5">申请进度</span>--}}
                {{--</div>--}}
                {{--<div class="aui-progress aui-progress-xs">--}}
                {{--<div class="aui-progress-bar" style="width: 60%;"></div>--}}
                {{--</div>--}}
                {{--</div>--}}
            @endforeach
            <div id="paginate-render"></div>
        @else
            <br/>
            <blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>
        @endif
    </section>
    <div class="aui-popup aui-popup-bottom" id="bottom">
        <div class="aui-popup-arrow"></div>
        <div class="aui-popup-content">
            <ul class="aui-list aui-list-noborder">
                <a href="{{route('wap.qianyi',['id'=>1])}}">
                    <li class="aui-list-item">
                        <div class="aui-list-item-label-icon">
                            <i class="aui-iconfont aui-icon-star aui-text-danger"></i>
                        </div>
                        <div class="aui-list-item-inner">
                            永久迁移
                        </div>
                    </li>
                </a>
                <a href="{{route('wap.linshi_qianyi',['id'=>1])}}">
                <li class="aui-list-item">
                    <div class="aui-list-item-label-icon">
                        <i class="aui-iconfont aui-icon-edit aui-text-info"></i>
                    </div>
                    <div class="aui-list-item-inner">
                        临时迁移
                    </div>
                </li>
                </a>
            </ul>
        </div>
    </div>
@stop
@section('js')
    <script type="text/javascript" src="{{asset('wap/bootstrap/js/aui-popup.js')}}"></script>
    @include('wap.layouts._paginate',[ 'count' => $qianyi->total(), ])

    <script>
        var popup = new auiPopup();

        function showPopup() {
            popup.show(document.getElementById("top-right"))
        }
    </script>
@stop