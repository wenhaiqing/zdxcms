@extends(getThemeView('layouts.main'))

@php
    $keyword = request('keyword', '');
    $topic_id = request('id','');
@endphp
@section('content')
    <blockquote class="layui-elem-quote news_search">
        <form class="layui-form layui-form-pane" method="GET" action="">
            <div class="layui-inline">
                {{--<a href="{{ route('replies.index',['if_cream'=>1]) }}" class="layui-btn">{{trans('replies.select_cream')}}</a>--}}
            </div>
        <div style="float: right;">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">{{trans('reply.content')}}</label>
                    <div class="layui-input-inline">
                        <input type="text" name="keyword" lay-verify="text" autocomplete="off" value="{{$keyword}}" class="layui-input">
                    </div>
                    <input type="hidden" name="id" value="{{$topic_id}}">
                    <input type="hidden" name="page" value="{{request('page',1)}}">
                    <button type="submit" class="layui-btn layui-btn-normal">{{trans('global.search')}}</button>
                </div>
            </div>
        </div>
        </form>
    </blockquote>


    <div class="layui-form">
        @if($replies->count())
            <table class="layui-table">
                <colgroup>
                    <col width="50">
                    <col>
                    <col>
                    <col>
                    <col width="300">
                </colgroup>
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{trans('reply.content')}}</th>
                    <th>{{trans('reply.author')}}</th>
                    <th>{{trans('reply.create_at')}}</th>
                    <th>{{trans('global.operation')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($replies as $index => $reply)
                    <tr>
                        <td>{{ $reply->id }}</td>
                        <td>{!! $reply->content !!}</td>
                        <td>{{ $reply->member->name  }}</td>
                        <td>{{ $reply->created_at->diffForHumans() }}</td>
                        <td>
                            @can('destroy_replies')
                            <a href="javascript:;" data-url="{{ route('replies.destroy', $reply->id) }}" class="layui-btn layui-btn-sm layui-btn-danger form-delete">{{trans('global.delete')}}</a>
                            @endcan
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

    @include(getThemeView('layouts._paginate'),[ 'count' => $replies->total(), ])
@endsection

