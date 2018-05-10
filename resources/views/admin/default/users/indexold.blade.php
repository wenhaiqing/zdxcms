@extends(getThemeView('layouts.main'))

@section("css")
    <link rel="stylesheet" href="/layui/treegrid/css/jquery.treegrid.css" media="all" />
@endsection
@section('content')
    @php
        $keyword = request('keyword', '');
        $begin_time = request('begin_time', '');
        $end_time = request('end_time', '');
        $users_type = request('users_type', '');
    @endphp
    <blockquote class="layui-elem-quote news_search">
        <form class="layui-form layui-form-pane" method="GET" action="{{route('zdxadmin.searchuser')}}">
            <div class="layui-inline">
                <a href="{{ route('users.create') }}" class="layui-btn">{{trans('global.add')}}</a>
            </div>
            <div style="float: right;">
                <div class="layui-inline">
                    <label class="layui-form-label">党支部类型</label>
                    <div class="layui-input-block">
                        <select name="users_type" lay-filter="articles_category">
                            <option value=""></option>
                                <option @if($users_type == 0) selected @endif value="0">{{trans('users.users_type_0')}}</option>
                                <option @if($users_type == 1) selected @endif value="1">{{trans('users.users_type_1')}}</option>
                                <option @if($users_type == 2) selected @endif value="2">{{trans('users.users_type_2')}}</option>
                        </select>
                    </div>
                </div>

                <div class="layui-inline">
                    <label class="layui-form-label">{{trans('global.start_time')}}</label>
                    <div class="layui-input-inline">
                        <input type="text" id="begin_time" name="begin_time" autocomplete="off" class="layui-input" value="{{$begin_time}}">
                    </div>
                </div>

                <div class="layui-inline">
                    <label class="layui-form-label">{{trans('global.end_time')}}</label>
                    <div class="layui-input-inline">
                        <input type="text" id="end_time" name="end_time" autocomplete="off" class="layui-input" value="{{$end_time}}">
                    </div>
                </div>

                <div class="layui-inline">
                    <label class="layui-form-label">{{trans('users.username')}}</label>
                    <div class="layui-input-inline">
                        <input type="text" name="keyword" lay-verify="" autocomplete="off" value="{{$keyword}}" class="layui-input">
                    </div>

                    <input type="hidden" name="page" value="{{request('page',1)}}">
                    <button type="submit" class="layui-btn layui-btn-normal">{{trans('global.search')}}</button>
                </div>
            </div>

        </form>
    </blockquote>


    <div class="layui-form links_list">
        @if(count($users)>0)
            <table class="layui-table tree">
                <colgroup>
                    <col width="150">
                    <col width="150">
                    <col width="150">
                    <col>
                    <col width="110">
                    <col width="80">
                    <col width="300">
                </colgroup>
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{trans('users.username')}}</th>
                    <th>{{trans('users.email')}}</th>
                    <th>{{trans('users.introduction')}}</th>
                    <th>{{trans('users.created_at')}}</th>
                    <th>{{trans('users.status')}}</th>
                    <th>{{trans('global.operation')}}</th>
                </tr>
                </thead>
                <tbody class="links_content">
                @foreach($users as $index => $user)
                    <tr class="treegrid-{{$user['id']}}  @if($user['pid']!=0) treegrid-parent-{{$user['pid']}} @endif">
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['name']  }}</td>
                        <td>{{ $user['email']  }}</td>
                        <td>{{ $user['introduction']  }}</td>
                        <td>{{ $user['created_at'] }}</td>
                        <td>@switch($user['status'])
                                @case(1){{trans('users.normal')}}@break
                                @case(2){{trans('users.forbidden')}}@break
                            @endswitch</td>
                        <td>
                            <a href="{{ route('users.edit', $user['id']) }}"
                               class="layui-btn layui-btn-sm layui-btn-normal">{{trans('global.edit')}}</a>
                            <a href="javascript:;" data-url="{{ route('users.destroy', $user['id']) }}"
                               class="layui-btn layui-btn-sm layui-btn-danger form-delete">{{trans('global.delete')}}</a>
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
            <br/>
            <blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>
        @endif

    </div>

@endsection

@section('js')
    @if (Session::has('message'))

        <script>layer.alert('{{ Session::get('message') }}', {icon: 4,time:3000});</script>
    @endif

    @if (Session::has('success'))

        <script>layer.alert('{{ Session::get('success') }}', {icon: 1,time:2000});</script>
    @endif

    @if (Session::has('danger'))
        <script>layer.alert('{{ Session::get('danger') }}', {icon: 3,time:3000});</script>
    @endif

    @if (count($errors) > 0)
        <script>layer.alert('@foreach ($errors->all() as $error) {{ $error }} <br /> @endforeach', {icon: 2,time:3000});</script>
    @endif

    <script type="text/javascript" src="/layui/lib/jquery/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="/layui/treegrid/js/jquery.treegrid.js"></script>
    <script type="text/javascript">

        $('.tree').treegrid({initialState: 'collapsed'});

        layui.use(['laypage', 'layer'], function(){
            var laypage = layui.laypage
                ,layer = layui.layer,
                $ = layui.jquery;

            $(".form-delete").click(function(){
                var tUrl = $(this).attr('data-url');
                layer.confirm('确认删除吗？', {
                    btn: ['确认', '取消']
                }, function(index){
                    $("#delete-form").attr("action",tUrl).submit();
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
        layui.laydate.render({
            elem: '#begin_time'
        });

        layui.laydate.render({
            elem: '#end_time'
        });

    </script>


@endsection

