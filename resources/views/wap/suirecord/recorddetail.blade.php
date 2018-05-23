@extends('wap.layouts._header')
@php
    $record_picture = is_json($lists->record_picture) ? json_decode($lists->record_picture) : new \stdClass();
@endphp
@section('css')
    <style type="text/css">
        .aui-list .aui-list-item-media {
            width: 3rem;
        }

        .notes-add {
            position: fixed;
            left: 0.5rem;
            bottom: 0.5rem;
            width: 3rem;
            z-index: 99;
        }

        textarea {
            height: 8rem;
            background-color: #ffffff;
            padding: 0.5rem;
        }

        .photos img {
            display: block;
            width: 100%;
        }

        .add-photos > div {
            width: 100%;
            height: 5.15rem;
            line-height: 5.15rem;
        }

        .add-photos > div .aui-iconfont {
            font-size: 2rem;
            color: #ccc;
        }

        .image-item {
            position: relative;
            height: 5.3rem;
            overflow: hidden;
            background-color: #f0f0f0;
        }

        .image-item img {
            display: block;
            margin: 0 auto;
            width: auto;
            height: 100%;
        }

        .image-item .delete-btn {
            position: absolute;
            left: 50%;
            top: 50%;
            width: 28px;
            height: 28px;
            background-color: rgba(0, 0, 0, 0.7);
            margin-left: -14px;
            margin-top: -14px;
            color: #ffffff;
            text-align: center;
            border-radius: 50%;
        }
    </style>
@stop
@section('content')
    <header class="aui-bar aui-bar-nav" id="header">
        <div class="aui-pull-left aui-btn" tapmode onclick="window.history.go(-1);">
            <span class="aui-iconfont aui-icon-left"></span>
        </div>
        <div class="aui-title">随笔记录</div>
    </header>

    <section class="aui-content-padded">
        <div class="aui-card-list">
            <div class="aui-card-list-header">
                {{$lists->record_title}}
            </div>

            @if(get_json_params($lists->record_picture,'0'))
                <ul class="aui-list aui-media-list">
                    <li class="aui-list-item">
                        <div class="aui-list-item-inner">
                            <div class="aui-row aui-row-padded">
                                @foreach($record_picture as $index=>$v)
                                <div class="aui-col-xs-4">
                                    <a href="{{$v}}">
                                    <img src="{{$v}}"/>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                </ul>
            @endif
            <div class="aui-card-list-footer">
                {{$lists->created_at}}
            </div>
        </div>
    </section>


    @stop

