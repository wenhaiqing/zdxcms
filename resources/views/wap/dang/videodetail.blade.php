@extends('wap.layouts._header')

@section('css')
    <link rel="stylesheet" href="{{asset('wap/bootstrap/video/css/reset.min.css')}}">
    <link rel="stylesheet" href="{{asset('wap/bootstrap/video/css/style.css')}}">
    @stop

@section('content')
    <div id="site">
        <div id="videoBox" class="box">
            <video width="100%" controls>
                <source src="{{$video->url}}" type="video/mp4">
                Your browser does not support HTML5 video. </video>
        </div>
        <div id="bloc">
            <div id="commentsBox" class="box">
                <div>
                    <a href="{{route('wap_suirecords.create',['model_id'=>$video->id,'model_title'=>'videos'])}}">
                        <button type="" class="aui-btn aui-btn-block aui-btn-sm " style="background-color: #03a9f4"><span
                                    style="color: #ffffff">随笔记录</span></button>
                    </a>
                </div>

            </div>
        </div>
    </div>
    @stop

@section('js')
    <script src="{{asset('layui/lib/jquery/jquery-2.1.4.js')}}"></script>
    <script src="{{asset('wap/bootstrap/video/js/index.js')}}"></script>
    @stop
