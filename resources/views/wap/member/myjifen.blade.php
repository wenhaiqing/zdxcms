@extends('wap.layouts._header')


@section('content')
    <header class="aui-bar aui-bar-nav" id="header">
        <div class="aui-pull-left aui-btn" tapmode onclick="window.history.go(-1);">
            <span class="aui-iconfont aui-icon-left"></span>
        </div>
        <div class="aui-title">我的积分记录</div>
    </header>
    <section class="aui-content-padded">
        @if($lists->count())

            @foreach($lists as $index=>$value)
                <div class="aui-info aui-margin-t-10 aui-padded-l-10 aui-padded-r-10">
                    <div class="aui-info-item">
                        <span class="aui-margin-l-5">{{$value->log}}</span>
                    </div>
                    <div class="aui-info-item">+{{$value->jifen}}</div>
                </div>
            
            @endforeach
            <div id="paginate-render"></div>
        @else
            <br/>
            <blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>
        @endif
    </section>
@stop
@section('js')
    @include('wap.layouts._paginate',[ 'count' => $lists->total(), ])
@stop