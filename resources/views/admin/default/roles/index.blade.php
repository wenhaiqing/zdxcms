@extends(getThemeView('layouts.main'))


@section('content')
    <blockquote class="layui-elem-quote news_search">
        <div class="layui-inline">
            <a href="{{ route('roles.create') }}" class="layui-btn">{{trans('global.add')}}</a>
        </div>
    </blockquote>


        <div class="layui-form">
            @if($roles->count())
                <table class="layui-table">
                    <colgroup>
                        <col width="50">
                        <col>
                        <col>
                        <col width="300">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{trans('roles.name')}}</th>
                        <th>{{trans('roles.remarks')}}</th>
                        <th>{{trans('global.operation')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $index => $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name  }}</td>
                            <td>{{ $role->remarks  }}</td>
                            <td>
                                <a href="{{ route('roles.edit', $role->id) }}" class="layui-btn layui-btn-sm layui-btn-normal">{{trans('global.edit')}}</a>
                                <a href="javascript:;" data-url="{{ route('roles.destroy', $role->id) }}" class="layui-btn layui-btn-sm layui-btn-danger form-delete">{{trans('global.delete')}}</a>
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

  @include(getThemeView('layouts._paginate'),[ 'count' => $roles->total(), ])
@endsection

