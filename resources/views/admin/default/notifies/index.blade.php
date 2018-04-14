@extends(getThemeView('layouts.main'))


@section('content')
    <blockquote class="layui-elem-quote news_search">
        <div class="layui-inline">
            <a href="{{ route('notifies.create') }}" class="layui-btn">{{trans('global.add')}}</a>
        </div>
    </blockquote>


    <div class="layui-form">
        @if($notifies->count())
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
                    <th>{{trans('notifies.name')}}</th>
                    <th>{{trans('notifies.create_at')}}</th>
                    <th>{{trans('notifies.operation')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($notifies as $index => $notify)
                    <tr>
                        <td>{{ $notify->id }}</td>
                        <td>{{ $notify->title  }}</td>
                        <td>{{ $notify->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('notifies.edit', $notify->id) }}" class="layui-btn layui-btn-sm layui-btn-normal">{{trans('global.edit')}}</a>
                            <a href="javascript:;" data-url="{{ route('notifies.destroy', $notify->id) }}" class="layui-btn layui-btn-sm layui-btn-danger form-delete">{{trans('global.delete')}}</a>
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

    @include(getThemeView('layouts._paginate'),[ 'count' => $notifies->total(), ])
@endsection

