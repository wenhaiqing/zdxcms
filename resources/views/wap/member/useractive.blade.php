@extends('wap.layouts._header')

@section('content')
    <header class="aui-bar aui-bar-nav">
        <div class="aui-pull-left aui-btn" tapmode onclick="window.history.go(-1);">
            <span class="aui-iconfont aui-icon-left"></span>
        </div>
        <div class="aui-title">活跃支部排名</div>

    </header>
    <div class="aui-tips aui-margin-b-15" id="tips-1">
        <i class="aui-iconfont aui-icon-info"></i>
        <div class="aui-tips-title">只显示排名前十的且每天更新一次</div>
        <i class="aui-iconfont aui-icon-close" onclick="closeTips()"></i>
    </div>
    <section class="aui-content-padded">

        @if(count($users))
            <div class="aui-content aui-margin-b-15">
                <ul class="aui-list aui-list-in">
                    @foreach($users as $index=>$value)
                        <li class="aui-list-item">
                            <div class="aui-list-item-inner">
                                <div class="aui-list-item-title">{{$value['name']}}</div>

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
    <script type="text/javascript" src="{{asset('wap/bootstrap/js/api.js')}}"></script>
    @include('wap.layouts._paginate',[ 'count' => count($users), ])
    <script>
        function closeTips(){
            $api.remove($api.byId("tips-1"));
        }
    </script>
@stop

