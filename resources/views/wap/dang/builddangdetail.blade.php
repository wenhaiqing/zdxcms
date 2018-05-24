@extends('wap.layouts._header')


@section('content')

    <header class="aui-bar aui-bar-nav" id="header">
        <div class="aui-pull-left aui-btn" tapmode onclick="window.history.go(-1);">
            <span class="aui-iconfont aui-icon-left"></span>
        </div>
        <div class="aui-title">党建动态</div>
        <a href="{{route('wap_suirecords.index',['model_id'=>$notice->id,'model_title'=>'build_dang'])}}" class="aui-pull-right aui-btn ">
            <span class="">随笔列表</span>
        </a>
    </header>
{{--    <div class=" sqhdtit"><img src="{{asset('wap/new/images/tonggao_top.jpg')}}" width="100%"/></div>--}}

        <a href="{{route('wap_suirecords.create',['model_id'=>$notice->id,'model_title'=>'build_dang'])}}">
            <button type="" class="aui-btn aui-btn-block aui-btn-sm " style="background-color: #03a9f4"><span
                        style="color: #ffffff">随笔记录</span></button>
        </a>
        <section class="aui-content-padded">
            <div class="aui-card-list">
                <div class="aui-card-list-header">
                    {{$notice->title}}
                </div>
                <div class="aui-card-list-content-padded">
                    {!! $notice->content !!}
                </div>
                <div class="aui-card-list-footer">
                    {{$notice->created_at}}
                </div>
            </div>
        </section>
    <div style=" width:100%;position:relative; bottom:0; left:auto; margin:0 auto;max-width:760px; t"><img
                src="{{asset('wap/bootstrap/images/lldj/mybg.jpg')}}" width="100%"/></div>
@stop
