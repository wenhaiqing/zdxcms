@extends(getThemeView('layouts.main'))

@php
    $keyword = request('keyword', '');
@endphp
@section('content')
    <blockquote class="layui-elem-quote news_search">
        <form class="layui-form layui-form-pane" method="GET" action="">
        <div class="layui-inline">
            <a href="{{ route('theme_dangs.create') }}" class="layui-btn">{{trans('global.add')}}</a>
        </div>
            <div class="layui-inline">
                <a href="{{ route('theme_dangs.index',['if_cream'=>1]) }}" class="layui-btn">{{trans('theme_dang.select_jinghua')}}</a>
            </div>
        <div style="float: right;">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">{{trans('theme_dang.title')}}</label>
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
        @if($theme_dangs->count())
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
                    <th>{{trans('theme_dang.title')}}</th>
                    <th>{{trans('theme_dang.descript')}}</th>
                    <th>{{trans('theme_dang.author')}}</th>
                    <th>{{trans('theme_dang.create_at')}}</th>
                    <th>{{trans('wechatmenu.type')}}</th>
                    <th>{{trans('global.operation')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($theme_dangs as $index => $theme_dang)
                    <tr>
                        <td>{{ $theme_dang->id }}</td>
                        <td>{{ $theme_dang->title  }}</td>
                        <td>{{ $theme_dang->descript  }}</td>
                        <td>{{ $theme_dang->user->name  }}</td>
                        <td>{{ $theme_dang->created_at->diffForHumans() }}</td>
                        <td>@if($theme_dang->if_cream==0){{ trans('global.if_cream_0') }}@else{{trans('global.if_cream_1')}}@endif</td>
                        <td>
                            @can('jinghua_theme_dang')
                                @if($theme_dang->if_cream == 0)
                                    <a href="javascript:;" data-url="{{ route('theme_dangs.jinghua', ['id'=>$theme_dang->id]) }}" class="layui-btn layui-btn-sm layui-btn-danger form-jinghua">{{trans('global.jinghua')}}</a>
                                @endif
                            @endcan
                            <a href="{{ route('theme_dangs.edit', $theme_dang->id) }}" class="layui-btn layui-btn-sm layui-btn-normal">{{trans('global.edit')}}</a>
                            <a href="javascript:;" data-url="{{ route('theme_dangs.destroy', $theme_dang->id) }}" class="layui-btn layui-btn-sm layui-btn-danger form-delete">{{trans('global.delete')}}</a>
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

    @include(getThemeView('layouts._paginate'),[ 'count' => $theme_dangs->total(), ])
@endsection

