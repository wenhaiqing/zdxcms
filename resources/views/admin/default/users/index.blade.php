@extends(getThemeView('layouts.main'))


@section('content')
    @php
        $keyword = request('keyword', '');
        $begin_time = request('begin_time', '');
        $end_time = request('end_time', '');
    @endphp
    <blockquote class="layui-elem-quote news_search">
        <form class="layui-form layui-form-pane" method="GET" action="">
            <div class="layui-inline">
                <a href="{{ route('users.create') }}" class="layui-btn">{{trans('global.add')}}</a>
            </div>
            <div style="float: right;">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">开始时间</label>
                    <div class="layui-input-inline">
                        <input type="text" id="begin_time" name="begin_time" autocomplete="off" class="layui-input" value="{{$begin_time}}">
                    </div>
                </div>

                <div class="layui-inline">
                    <label class="layui-form-label">结束时间</label>
                    <div class="layui-input-inline">
                        <input type="text" id="end_time" name="end_time" autocomplete="off" class="layui-input" value="{{$end_time}}">
                    </div>
                </div>

                <div class="layui-inline">
                    <label class="layui-form-label">{{trans('users.username')}}</label>
                    <div class="layui-input-inline">
                        <input type="text" name="keyword" lay-verify="email" autocomplete="off" value="{{$keyword}}" class="layui-input">
                    </div>
                    {{--<input type="hidden" name="category" value="{{$category_id}}">--}}
                    <input type="hidden" name="page" value="{{request('page',1)}}">
                    <button type="submit" class="layui-btn layui-btn-normal">搜索</button>
                </div>
            </div>
            </div>
        </form>
    </blockquote>


    <div class="layui-form">
        @if($users->count())
            <table class="layui-table">
                <colgroup>
                    <col width="50">
                    <col width="150">
                    <col width="150">
                    <col>
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
                    <th>{{trans('users.roles')}}</th>
                    <th>{{trans('users.introduction')}}</th>
                    <th>{{trans('users.created_at')}}</th>
                    <th>{{trans('users.status')}}</th>
                    <th>{{trans('global.operation')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $index => $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name  }}</td>
                        <td>{{ $user->email  }}</td>
                        <td>{{ implode(',',$user->roles()->pluck('remarks', 'name')->toArray()) }}</td>
                        <td>{{ $user->introduction  }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>@switch($user->status)
                                @case(1){{trans('users.normal')}}@break
                                @case(2){{trans('users.forbidden')}}@break
                            @endswitch</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}"
                               class="layui-btn layui-btn-sm layui-btn-normal">{{trans('global.edit')}}</a>
                            <a href="javascript:;" data-url="{{ route('users.destroy', $user->id) }}"
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
    <script type="text/javascript">

        layui.laydate.render({
            elem: '#begin_time'
        });

        layui.laydate.render({
            elem: '#end_time'
        });

    </script>

    @include(getThemeView('layouts._paginate'),[ 'count' => $users->total(), ])
@endsection

