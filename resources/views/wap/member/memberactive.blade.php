@extends('wap.layouts._header')

@section('content')
    <header class="aui-bar aui-bar-nav">
        <div class="aui-pull-left aui-btn" tapmode onclick="window.history.go(-1);">
            <span class="aui-iconfont aui-icon-left"></span>
        </div>
        <div class="aui-title">活跃党员排名</div>

    </header>
    <section class="aui-content-padded">

        @if($members->count())
            <div class="aui-content aui-margin-b-15">
                <ul class="aui-list aui-list-in">
                    @foreach($members as $index=>$value)
                        <li class="aui-list-item">
                            <div class="aui-list-item-inner">
                                <div class="aui-list-item-title">{{$value->name}}</div>

                                <div class="aui-list-item-right">
                                    <div class="aui-label aui-label-info">{{$index+1}}</div>
                                </div>

                            </div>
                        </li>

                    @endforeach
                </ul>
            </div>
            {{--<div id="paginate-render"></div>--}}
        @else
            <br/>
            <blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>
        @endif
    </section>

@stop
@section('js')
    @include('wap.layouts._paginate',[ 'count' => $members->total(), ])
@stop

