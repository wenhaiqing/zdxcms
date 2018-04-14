@extends(getThemeView('layouts.main'))

@php
    $keyword = request('keyword', '');
@endphp
@section('content')
    <blockquote class="layui-elem-quote news_search">
        <form class="layui-form layui-form-pane" method="GET" action="">
        <div class="layui-inline">
            <a href="{{ route('notifies.create') }}" class="layui-btn">{{trans('global.add')}}</a>
        </div>
        <div style="float: right;">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">{{trans('notifies.title')}}</label>
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
                    <th>{{trans('notifies.title')}}</th>
                    <th>{{trans('notifies.create_at')}}</th>
                    <th>{{trans('global.operation')}}</th>
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

