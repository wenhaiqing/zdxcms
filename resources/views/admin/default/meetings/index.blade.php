@extends(getThemeView('layouts.main'))

@php
    $keyword = request('keyword', '');
@endphp
@section('content')
    <blockquote class="layui-elem-quote news_search">
        <form class="layui-form layui-form-pane" method="GET" action="">
            <div class="layui-inline">
                <a href="{{ route('meetings.create') }}" class="layui-btn">{{trans('global.add')}}</a>
            </div>
        <div style="float: right;">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">{{trans('meetings.title')}}</label>
                    <div class="layui-input-inline">
                        <input type="text" name="keyword" lay-verify="text" autocomplete="off" value="{{$keyword}}" class="layui-input">
                    </div>
                    {{--<input type="hidden" name="category" value="{{$category_id}}">--}}
                    <input type="hidden" name="page" value="{{request('page',1)}}">
                    <button type="submit" class="layui-btn layui-btn-normal">{{trans('global.search')}}</button>
                </div>
            </div>
        </div>
        </form>
    </blockquote>


    <div class="layui-form">
        @if($meetings->count())
            <table class="layui-table">
                <colgroup>
                    <col width="50">
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col width="300">
                </colgroup>
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{trans('meetings.title')}}</th>
                    <th>{{trans('meetings.compere')}}</th>
                    <th>{{trans('meetings.author')}}</th>
                    <th>{{trans('meetings.address')}}</th>
                    <th>{{trans('meetings.starttime')}}</th>
                    <th>{{trans('meetings.endtime')}}</th>
                    <th>{{trans('global.operation')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($meetings as $index => $meeting)
                    <tr>
                        <td>{{ $meeting->id }}</td>
                        <td>{{ $meeting->meeting_title  }}</td>
                        <td>{{ $meeting->meeting_compere  }}</td>
                        <td>{{ $meeting->user->name  }}</td>
                        <td>{{ $meeting->meeting_address  }}</td>
                        <td>{{ $meeting->meeting_starttime  }}</td>
                        <td>{{ $meeting->meeting_endtime}}</td>
                        <td>
                            <a href="javascript:;" data-method="notice" data-url="{{route('wap.meeting_sign',['meeting_id'=>$meeting->id])}}" id="qrcode" class="layui-btn layui-btn-sm layui-btn-normal">{{trans('meetings.meeting_sign_qrcode')}}</a>
                            <a href="{{ route('meetings.edit', $meeting->id) }}" class="layui-btn layui-btn-sm layui-btn-normal">{{trans('global.edit')}}</a>
                            <a href="javascript:;" data-url="{{ route('meetings.destroy', $meeting->id) }}" class="layui-btn layui-btn-sm layui-btn-danger form-delete">{{trans('global.delete')}}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <form id="delete-form" action="" method="POST" style="display:none;">
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
            </form>
            <div id="paginate-render"></div>
        @else
            <br />
            <blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>
        @endif

    </div>

@endsection

@section('js')

    @include(getThemeView('layouts._paginate'),[ 'count' => $meetings->total(), ])
    <script src="{{asset('layui/lib/jquery/jquery-2.1.4.js')}}"></script>
    <script src="https://cdn.bootcss.com/jquery.qrcode/1.0/jquery.qrcode.min.js"></script>
    <script>
        layui.use('layer', function(){ //独立版的layer无需执行这一句
            var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句

            //触发事件
            var active = {
                notice: function(){
                    //示范一个公告层
                    layer.open({
                        type: 1
                        ,title: false //不显示标题栏
                        ,closeBtn: false
                        ,area: '300px;'
                        ,shade: 0.8
                        ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
                        ,btn: ['关闭']
                        ,btnAlign: 'c'
                        ,moveType: 1 //拖拽模式，0或者1
                        ,content: '<div id="layuiqrcode" style="padding: 25px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 400;"></div>'
                        ,success: function(layero){
                        }
                    });
                }

            };

            $('#qrcode').on('click', function(){
                var othis = $(this), method = othis.data('method');
                active[method] ? active[method].call(this, othis) : '';
                var url = othis.data('url');
                $('#layuiqrcode').qrcode(url);
            });

        });
    </script>
@endsection

