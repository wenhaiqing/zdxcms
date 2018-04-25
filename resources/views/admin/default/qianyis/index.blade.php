@extends(getThemeView('layouts.main'))

@php
    $keyword = request('keyword', '');
@endphp
@section('content')
    <blockquote class="layui-elem-quote news_search">
        <form class="layui-form layui-form-pane" method="GET" action="">
            <div class="layui-inline">
                {{--<a href="{{ route('qianyis.index',['if_cream'=>1]) }}" class="layui-btn">{{trans('qianyis.select_cream')}}</a>--}}
            </div>
        <div style="float: right;">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">{{trans('qianyis.name')}}</label>
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
        @if($qianyis->count())
            <table class="layui-table">
                <colgroup>
                    <col width="50">
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    {{--<col>--}}
                    <col width="300">
                </colgroup>
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{trans('qianyis.name')}}</th>
                    <th>{{trans('qianyis.from_user_name')}}</th>
                    <th>{{trans('qianyis.to_user_name')}}</th>
                    <th>{{trans('qianyis.status')}}</th>
                    {{--<th>{{trans('qianyis.view_count')}}</th>--}}
                    <th>{{trans('qianyis.create_at')}}</th>
                    <th>{{trans('global.operation')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($qianyis as $index => $qianyi)
                    <tr>
                        <td>{{ $qianyi->id }}</td>
                        <td>{{ $qianyi->name  }}</td>
                        <td>{{ $qianyi->from_user_name  }}</td>
                        <td>{{ $qianyi->to_user_name  }}</td>
                        <td>{{ $qianyi->status  }}</td>
{{--                        <td>{{ $qianyi->view_count  }}</td>--}}
                        <td>{{ $qianyi->created_at->diffForHumans() }}</td>
                        <td>
                            @if($qianyi->status == 0)
                            <a href="{{ route('zdxadmin.up_qianyis', ['id'=>$qianyi->id]) }}" class="layui-btn layui-btn-sm layui-btn-normal">{{trans('qianyis.upqianyi')}}</a>
                            @endif
                            @if($qianyi->status == 1)
                            <a href="javascript:;" data-url="{{ route('qianyis.end', ['id'=>$qianyi->id]) }}" class="layui-btn layui-btn-sm layui-btn-normal qianyi-form">{{trans('qianyis.end')}}</a>
                                @endif
                                @if($qianyi->status !=2)
                            <a href="javascript:;" data-url="{{ route('qianyis.destroy', $qianyi->id) }}" class="layui-btn layui-btn-sm layui-btn-danger form-delete">{{trans('global.delete')}}</a>
                                    @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <form id="delete-form" action="" method="POST" style="display:none;">
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
            </form>
            <form id="qianyi-form" action="" method="POST" style="display:none;">
                <input type="hidden" name="_method" value="POST">
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

    @include(getThemeView('layouts._paginate'),[ 'count' => $qianyis->total(), ])

    <script>
        layui.use(['laypage', 'layer'], function(){
            var $ = layui.jquery;

            $(".qianyi-form").click(function(){

                var tUrl = $(this).attr('data-url');

                layer.confirm('确认已经迁移完成了？该操作后党员会被直接迁移不可更改', {
                    btn: ['确认', '取消']
                }, function(index){
                    $("#qianyi-form").attr("action",tUrl).submit();
//                console.log(tUrl);
                    layer.close(index);
                    return false;
                }, function(index){
                    layer.close(index);
                    return true;
                });

                return false;
            });


        });

    </script>
@endsection

