@extends(getThemeView('layouts.main'))

@section("css")
    <link rel="stylesheet" href="/layui/treegrid/css/jquery.treegrid.css" media="all" />
@endsection
@section("content")
    <blockquote class="layui-elem-quote news_search">
        <div class="layui-inline">
            <a href="{{ route('permissions.create') }}" class="layui-btn">{{trans('global.add')}}</a>
        </div>
    </blockquote>
    <div class="layui-form links_list">
        @if(count($permissions))
        <table class="layui-table tree">
            <colgroup>
                <col width="100px">
                <col width="">
                <col>
                <col>
                <col width="">
            </colgroup>
            <thead>
            <tr>
                <th>#</th>
                <th style="text-align:left;">{{trans('permissions.name')}}</th>
                <th style="text-align:left;">{{trans('permissions.remarks')}}</th>
                <th style="text-align:left;">{{trans('permissions.url')}}</th>
                <th>{{trans('global.operation')}}</th>
            </tr>
            </thead>
            <tbody class="links_content">
            @foreach ($permissions as $permission)
                <tr class="treegrid-{{$permission['id']}} @if($permission['pid']!=0) treegrid-parent-{{$permission['pid']}} @endif">
                    <td>{{ $permission['id'] }}</td>
                    <td style="text-align:left;">{{ $permission['name'] }}</td>
                    <td style="text-align:left;">{{ $permission['ltitle'] }}</td>
                    <td style="text-align:left;">{{ $permission['url'] }}</td>
                    <td>
                        <a href="{{ route('permissions.edit', $permission['id']) }}" class="layui-btn layui-btn-sm layui-btn-normal">{{trans('global.edit')}}</a>
                        <a href="javascript:;" data-url="{{ route('permissions.destroy', $permission['id']) }}" class="layui-btn layui-btn-sm layui-btn-danger form-delete">{{trans('global.delete')}}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            <form id="delete-form" action="" method="POST" style="display:none;">
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
            </form>
        @else
            <br />
            <blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>
        @endif
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="/layui/lib/jquery/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="/layui/treegrid/js/jquery.treegrid.js"></script>
    @include(getThemeView('layouts._paginate'),[ 'count' => count($permissions), ])
    <script>
        $('.tree').treegrid({initialState: 'collapsed'});
    </script>
@endsection