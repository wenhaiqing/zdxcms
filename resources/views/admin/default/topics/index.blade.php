@extends(getThemeView('layouts.main'))

@php
    $keyword = request('keyword', '');
@endphp
@section('content')
    <blockquote class="layui-elem-quote news_search">
        <form class="layui-form layui-form-pane" method="GET" action="">
            <div class="layui-inline">
                <a href="{{ route('topics.index',['if_cream'=>1]) }}" class="layui-btn">{{trans('topics.select_cream')}}</a>
            </div>
        <div style="float: right;">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">{{trans('topics.title')}}</label>
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
        @if($topics->count())
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
                    <th>{{trans('topics.title')}}</th>
                    <th>{{trans('topics.content')}}</th>
                    <th>{{trans('topics.author')}}</th>
                    <th>{{trans('topics.reply_count')}}</th>
                    {{--<th>{{trans('topics.view_count')}}</th>--}}
                    <th>{{trans('topics.create_at')}}</th>
                    <th>{{trans('global.operation')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($topics as $index => $topic)
                    <tr>
                        <td>{{ $topic->id }}</td>
                        <td>{{ $topic->title  }}</td>
                        <td>{{ $topic->excerpt  }}</td>
                        <td>{{ $topic->member->name  }}</td>
                        <td>{{ $topic->reply_count  }}</td>
{{--                        <td>{{ $topic->view_count  }}</td>--}}
                        <td>{{ $topic->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('topics.edit', $topic->id) }}" class="layui-btn layui-btn-sm layui-btn-normal">{{trans('global.edit')}}</a>
                            <a href="{{ route('replies.index', ['id'=>$topic->id]) }}" class="layui-btn layui-btn-sm layui-btn-normal">{{trans('topics.reply')}}</a>
                            <a href="javascript:;" data-url="{{ route('topics.destroy', $topic->id) }}" class="layui-btn layui-btn-sm layui-btn-danger form-delete">{{trans('global.delete')}}</a>
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

    @include(getThemeView('layouts._paginate'),[ 'count' => $topics->total(), ])
@endsection

