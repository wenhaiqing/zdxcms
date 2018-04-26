@extends('wap.layouts._header')

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

@php
    $keyword = request('keyword', '');
@endphp
@section('content')
    <header class="aui-bar aui-bar-nav">
        <div class="aui-pull-left aui-btn" tapmode onclick="window.history.go(-1);">
            <span class="aui-iconfont aui-icon-left"></span>
        </div>
        <div class="aui-title" style="left:2rem; right: 2rem;">
            <div class="aui-searchbar" id="search">
                <div class="aui-searchbar-input aui-border-radius">
                    <i class="aui-iconfont aui-icon-search"></i>
                    <form class="layui-form layui-form-pane" id="search-form" method="GET" action="">
                        <input name="keyword" type="search" placeholder="请输入搜索内容" id="zdx-search" value="{{$keyword}}">
                        {{--<input name="id" type="hidden"  value="{{$user_id}}">--}}
                    </form>
                    <div class="aui-searchbar-clear-btn">
                        <i class="aui-iconfont aui-icon-close"></i>
                    </div>
                </div>
                <div class="aui-searchbar-btn" tapmode>取消</div>
            </div>
        </div>
        <div class="aui-pull-right aui-btn aui-btn-outlined search-button" id="search-button">
            <span class="aui-iconfont aui-icon-search"></span>
        </div>
    </header>


    <section class="aui-content-padded" style="margin-top: 33px;">
        <div class="aui-card-list">
            @if ($replies->count())
                <div class="aui-card-list-content">
                    <ul class="aui-list aui-media-list">
                        @foreach($replies as $index=>$reply)

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
                                        <div class="aui-list-item-media aui-padded-r-10"
                                             style="width: 4rem;float: right">
                                            <form action="{{ route('wap.reply_destroy', ['id'=>$reply->id,'member_id'=>$reply->member_id]) }}"
                                                  method="post">
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
                <div id="paginate-render"></div>
            @else
                <br/>
                <blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>
            @endif
        </div>
    </section>

@stop
@section('js')
    @include(getThemeView('layouts._paginate'),[ 'count' => $replies->total(), ])
@stop
