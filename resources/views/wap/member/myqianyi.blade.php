@extends('wap.layouts._header')


@section('content')
    <header class="aui-bar aui-bar-nav" id="header">
        <div class="aui-pull-left aui-btn" tapmode onclick="window.history.go(-1);">
            <span class="aui-iconfont aui-icon-left"></span>
        </div>
        <div class="aui-title">我的迁党申请</div>
        <a href="{{route('wap.qianyi',['id'=>1])}}" class="aui-pull-right aui-btn ">
            <span class="">发起申请</span>
        </a>
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
@stop
@section('js')
    @include('wap.layouts._paginate',[ 'count' => $qianyi->total(), ])
@stop