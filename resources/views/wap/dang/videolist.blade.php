@extends('wap.layouts._header')

@section('css')
    <link href="{{asset('wap/bootstrap/css/SpryTabbedPanels.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('wap/bootstrap/css/spkc.css')}}" rel="stylesheet" type="text/css" />
@stop

@section('content')
    <header class="aui-bar aui-bar-nav" id="header">
        <a class="aui-btn aui-pull-left" tapmode onclick="window.history.go(-1);">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <div class="aui-title">视频课程</div>
    </header>
    <div class="sptop"><img src="{{asset('wap/bootstrap/images/lldj/splunbo.jpg')}}"/></div>
    <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent" style="height:auto; min-height:900px;">
            <ul class="splist">
                @foreach($lists as $index=>$list)
                    <a href="{{route('wap.videodetail',['id'=>$list->id,'title'=>$list->title])}}">
                        <li>
                            <img src="{{$list->cover}}"/>
                            <p>{{$list->title}}</p>
                            <div class="spteacher">&nbsp;&nbsp;<span
                                        class="sptime">&nbsp;&nbsp;{{$list->description}}</span>
                            </div>
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
@stop
