@extends('wap.layouts._header')

@php
    $keyword = request('keyword', '');
@endphp
@section('css')
    <style>
        .aui-list .aui-list-item-inner {
            position: relative;
            min-height: 2rem;
            padding-right: 0.75rem;
            width: 100%;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-flex: 1;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            border-left: #03a9f4 3px solid;
            margin: 0.5em 0;
            padding-left: 0.75rem;
        }

        .layui-laypage .layui-laypage-curr .layui-laypage-em {
            background-color: #03a9f4;
        }

        #paginate-render {
            padding-left: 0;
            text-align: center;
        }
    </style>

@stop
@section('content')

    <div class=" sqhdtit"><img src="{{asset('wap/new/images/data_top.jpg')}}" width="100%"/></div>
    <section class="aui-content-padded">

        <div class="aui-content aui-margin-b-15">
            <ul class="aui-list aui-list-in">
                <a href="{{route('analysis.census_video')}}">
                    <li class="aui-list-item">
                        <div class="aui-list-item-inner">
                            <div class="aui-list-item-title">内容偏好分析</div>
                        </div>
                    </li>
                </a>
                <a href="{{route('analysis.pie')}}">
                    <li class="aui-list-item">
                        <div class="aui-list-item-inner">
                            <div class="aui-list-item-title">党组织数据分析</div>
                        </div>
                    </li>
                </a>
                <a href="{{route('analysis.sex')}}">
                    <li class="aui-list-item">
                        <div class="aui-list-item-inner">
                            <div class="aui-list-item-title">党员男女数量分析</div>
                        </div>
                    </li>
                </a>
                <a href="{{route('analysis.census_age')}}">
                    <li class="aui-list-item">
                        <div class="aui-list-item-inner">
                            <div class="aui-list-item-title">党员年龄统计分析</div>
                        </div>
                    </li>
                </a>
                <a href="{{route('analysis.census_dang_age')}}">
                    <li class="aui-list-item">
                        <div class="aui-list-item-inner">
                            <div class="aui-list-item-title">党员党龄统计分析</div>
                        </div>
                    </li>
                </a>
                <a href="{{route('analysis.census_move')}}">
                    <li class="aui-list-item">
                        <div class="aui-list-item-inner">
                            <div class="aui-list-item-title">各县党支部流动党员分析</div>
                        </div>
                    </li>
                </a>
                <a href="{{route('analysis.census_xian')}}">
                    <li class="aui-list-item">
                        <div class="aui-list-item-inner">
                            <div class="aui-list-item-title">各县入驻党支部数量分析</div>
                        </div>
                    </li>
                </a>
                <a href="{{route('analysis.census_meeting')}}">
                    <li class="aui-list-item">
                        <div class="aui-list-item-inner">
                            <div class="aui-list-item-title">每月党员会议签到数据分析</div>
                        </div>
                    </li>
                </a>
                <a href="{{route('analysis.bar')}}">
                    <li class="aui-list-item">
                        <div class="aui-list-item-inner">
                            <div class="aui-list-item-title">党员学历数据分析</div>
                        </div>
                    </li>
                </a>
                <a href="{{route('analysis.zheng')}}">
                    <li class="aui-list-item">
                        <div class="aui-list-item-inner">
                            <div class="aui-list-item-title">党员正式预备数据分析</div>
                        </div>
                    </li>
                </a>
                <a href="{{route('analysis.current')}}">
                    <li class="aui-list-item">
                        <div class="aui-list-item-inner">
                            <div class="aui-list-item-title">党支部现状数据分析</div>
                        </div>
                    </li>
                </a>



            </ul>
        </div>

    </section>
    <div style=" width:100%;position:relative; bottom:0; left:auto; margin:0 auto;max-width:760px; t"><img
                src="{{asset('wap/bootstrap/images/lldj/mybg.jpg')}}" width="100%"/></div>
@stop
