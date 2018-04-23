@extends('wap.layouts._header')


@section('content')
    <header class="aui-bar aui-bar-nav" id="header">
        <div class="aui-pull-left aui-btn" tapmode onclick="window.history.go(-1);">
            <span class="aui-iconfont aui-icon-left"></span>
        </div>
        <div class="aui-title">主题党日</div>
    </header>
    <div class=" sqhdtit"><img src="{{asset('wap/bootstrap/images/lldj/ztdr1.jpg')}}" width="100%"/></div>
    @foreach($themeds as $index=>$themed)
        <section class="aui-content-padded">
            <div class="aui-card-list">
                <div class="aui-card-list-header">
                    {{$themed->title}}
                </div>
                <div class="aui-card-list-content-padded">
                    {!! $themed->content !!}
                </div>
                <div class="aui-card-list-footer">
                    {{$themed->created_at}}
                </div>
            </div>
        </section>
    @endforeach
    <div style=" width:100%;position:relative; bottom:0; left:auto; margin:0 auto;max-width:760px; t"><img
                src="{{asset('wap/bootstrap/images/lldj/mybg.jpg')}}" width="100%"/></div>
@stop