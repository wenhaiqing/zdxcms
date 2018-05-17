@extends('wap.layouts._header')
@php
    $image = is_json($topics->image) ? json_decode($topics->image) : new \stdClass();
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

         .max{width:100%;height:auto;}
        .min{width:100px;height:auto;}

    </style>
@stop
@section('content')
    <header class="aui-bar aui-bar-nav" id="header">
        <div class="aui-pull-left aui-btn" tapmode onclick="window.history.go(-1);">
            <span class="aui-iconfont aui-icon-left"></span>
        </div>
        <div class="aui-title">互助中心</div>
    </header>

    <section class="aui-content-padded">
        <div class="aui-card-list">
            <div class="aui-card-list-header">
                {{$topics->title}}
            </div>
            <div class="aui-card-list-content-padded">
                {!! $topics->content !!}
            </div>
            @if(get_json_params($topics->image,'0'))
                <ul class="aui-list aui-media-list">
                    <li class="aui-list-item">
                        <div class="aui-list-item-inner">
                            <div class="aui-row aui-row-padded">
                                @foreach($image as $index=>$v)
                                <div class="aui-col-xs-4">
                                    <a href="{{$v}}">
                                    <img class="image-item" src="{{$v}}"/>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                </ul>
            @endif
            <div class="aui-card-list-footer">
                {{$topics->created_at}}
                <div class="aui-info-item">{{$topics->member->name}}</div>
            </div>
        </div>
    </section>

        <section class="aui-content-padded">
            <form action="{{route('wap.reply_store')}}" method="POST" accept-charset="UTF-8">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="topic_id" value="{{ $topics->id }}">
            <textarea name="content" required placeholder="在这里输入内容..."></textarea></br>
            <button type="submit" class="aui-btn" style="background-color: #03a9f4;float: right"><span
                        style="color: #ffffff">回复</span></button>
            </form>
        </section>
    @if ($topics->replies->count())
        <section class="aui-content-padded" style="margin-top: 33px;">
            <div class="aui-card-list">
                <div class="aui-card-list-content">
                    <ul class="aui-list aui-media-list">
                        @foreach($topics->replies as $index=>$reply)

                                <li class="aui-list-item">
                                    <div class="aui-media-list-item-inner">
                                        <div class="aui-list-item-media aui-padded-r-10" style="width: 1.5rem;">
                                            @if($reply->member->avatar)
                                                <img src="{{$reply->member->avatar}}" class="aui-img-round">
                                            @else
                                                <img src="{{asset('wap/bootstrap/images/test/head_logo.jpg')}}"
                                                     class="aui-img-round">
                                            @endif
                                        </div>

                                        <div class="aui-list-item-inner">
                                            <a href="{{route('wap.topic_show',['id'=>$reply->topic_id])}}">
                                            <div class="aui-list-item-text">
                                                <div class="aui-list-item-title aui-font-size-12 text-light">{{$reply->member->name}}</div>
                                            </div>
                                            <div class="aui-list-item-text aui-font-size-14"
                                                 style="color:#333;padding-top: 0.4rem;">
                                                {!! $reply->content !!}
                                            </div>
                                            </a>
                                        </div>
                                        @if(\Auth::guard('wap')->id() == $reply->member_id)
                                        <div class="aui-list-item-media aui-padded-r-10" style="width: 4rem;float: right">
                                            <form action="{{ route('wap.reply_destroy', ['id'=>$reply->id,'member_id'=>$reply->member_id]) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-default btn-xs pull-left">
                                                    <i class="aui-iconfont aui-icon-trash" style="float: right"></i>
                                                </button>
                                            </form>
                                        </div>
                                            @endif
                                    </div>
                                </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    @endif

    @stop

