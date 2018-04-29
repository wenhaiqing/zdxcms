@extends(getThemeView('layouts.main'))

@php
    $keyword = request('keyword', '');
@endphp
@section('content')
    <blockquote class="layui-elem-quote news_search">
        <form class="layui-form layui-form-pane" method="GET" action="">
            <div class="layui-inline">
                <a href="{{ route('members.create') }}" class="layui-btn">{{trans('global.add')}}</a>
            </div>
            <div style="float: right;">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">{{trans('members.name')}}</label>
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
            @if($members->count())
                <table class="layui-table">
                    <colgroup>
                        <col width="50">
                        <col>
                        <col>
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
                        <th>{{trans('members.name')}}</th>
                        <th>{{trans('members.mobile')}}</th>
                        <th>{{trans('members.user_id')}}</th>
                        <th>{{trans('members.nation')}}</th>
                        <th>{{trans('members.cardnum')}}</th>
                        <th>{{trans('members.record')}}</th>
                        <th>{{trans('members.age')}}</th>
                        <th>{{trans('global.operation')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($members as $index => $member)
                        <tr>
                            <td>{{ $member->id }}</td>
                            <td>{{ $member->name  }}</td>
                            <td>{{ $member->mobile  }}</td>
                            <td>{{ $member->user->name  }}</td>
                            <td>{{ $member->nation  }}</td>
                            <td>{{ $member->cardnum  }}</td>
                            <td>{{ $member->record  }}</td>
                            <td>{{ $member->age  }}</td>
                            <td>
                                <a href="{{ route('members.edit', $member->id) }}" class="layui-btn layui-btn-sm layui-btn-normal">{{trans('global.edit')}}</a>
                                <a href="{{ route('signs.signshow', ['id'=>$member->id,'member_id'=>$member->id]) }}" class="layui-btn layui-btn-sm layui-btn-normal">{{trans('members.sign')}}</a>
                                <a href="javascript:;" data-url="{{ route('members.destroy', $member->id) }}" class="layui-btn layui-btn-sm layui-btn-danger form-delete">{{trans('global.delete')}}</a>
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

  @include(getThemeView('layouts._paginate'),[ 'count' => $members->total(), ])
@endsection

