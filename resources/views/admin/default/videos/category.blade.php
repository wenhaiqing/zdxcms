@extends(getThemeView('layouts.main'))

@php
    $keyword = request('keyword', '');
@endphp
@section('content')

    <blockquote class="layui-elem-quote news_search">
        <form class="layui-form layui-form-pane" method="GET" action="">
            <div class="layui-inline">
                <a href="{{ route('videos.category.add') }}" class="layui-btn">{{trans('global.add')}}</a>
            </div>
        </form>
    </blockquote>

    <div class="layui-form">
        @if($lists->count())
            <table class="layui-table">
                <colgroup>
                    <col width="50">
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
                    <th>{{trans('video.category_title')}}</th>
                    <th>{{trans('video.create_at')}}</th>
                    <th>{{trans('global.operation')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lists as $index => $list)
                    <tr>
                        <td>{{ $list->id }}</td>
                        <td>{{ $list->title  }}</td>
                        <td>{{ $list->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('videos.category.edit', ['id'=>$list->id]) }}" class="layui-btn layui-btn-sm layui-btn-normal">{{trans('global.edit')}}</a>
                            <a href="javascript:;" data-url="{{ route('videos.category.destroy', ['id'=>$list->id]) }}" class="layui-btn layui-btn-sm layui-btn-danger form-delete">{{trans('global.delete')}}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <form id="delete-form" action="" method="POST" style="display:none;">
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
            </form>
            <form id="jinghua-form" action="" method="POST" style="display:none;">
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

    @include(getThemeView('layouts._paginate'),[ 'count' => $lists->total(), ])
@endsection

