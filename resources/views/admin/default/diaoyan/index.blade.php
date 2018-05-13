@extends(getThemeView('layouts.main'))

@php
    $keyword = request('keyword', '');
@endphp
@section('content')
    {{--<blockquote class="layui-elem-quote news_search">--}}
        {{--<form class="layui-form layui-form-pane" method="GET" action="">--}}
            {{--<div class="layui-inline">--}}
                {{--<a href="{{ route('diaoyan.create') }}" class="layui-btn">{{trans('global.add')}}</a>--}}
            {{--</div>--}}
        {{--<div style="float: right;">--}}
            {{--<div class="layui-form-item">--}}
                {{--<div class="layui-inline">--}}
                    {{--<label class="layui-form-label">{{trans('diaoyans.title')}}</label>--}}
                    {{--<div class="layui-input-inline">--}}
                        {{--<input type="text" name="keyword" lay-verify="text" autocomplete="off" value="{{$keyword}}" class="layui-input">--}}
                    {{--</div>--}}
                    {{--<input type="hidden" name="category" value="{{$category_id}}">--}}
                    {{--<input type="hidden" name="page" value="{{request('page',1)}}">--}}
                    {{--<button type="submit" class="layui-btn layui-btn-normal">{{trans('global.search')}}</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--</form>--}}
    {{--</blockquote>--}}


    <div class="layui-form">
        @if($diaoyans->count())
            <table class="layui-table">
                <colgroup>
                    <col width="50">
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
                    <th>{{trans('diaoyans.prode_theme')}}</th>
                    <th>{{trans('diaoyans.prode_site')}}</th>
                    <th>{{trans('diaoyans.prode_form')}}</th>
                    <th>{{trans('diaoyans.prode_object')}}</th>
                    <th>{{trans('diaoyans.problem')}}</th>
                    <th>{{trans('diaoyans.opinions')}}</th>
                    <th>{{trans('global.operation')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($diaoyans as $index => $diaoyan)
                    <tr>
                        <td>{{ $diaoyan->id }}</td>
                        <td>{{ $diaoyan->prode_theme }}</td>
                        <td>{{ $diaoyan->prode_site  }}</td>
                        <td>@switch($diaoyan->prode_form)
                                @case(0) 未选择 @break
                                @case(1) 召开座谈会 @break
                                @case(2) 问卷调查 @break
                                @case(3) 个人走访 @break
                                @case(4) 网络调查 @break
                                @case(5) 实地走访 @break
                                @case(6) 专项检查 @break
                                @case(7) 其他 @break
                                @endswitch
                            </td>
                        <td>@switch($diaoyan->prode_object)
                                @case(0) 未选择 @break
                                @case(1) 个人 @break
                                @case(2) 基层组织 @break
                                @endswitch
                            </td>
                        <td>{{ $diaoyan->problem  }}</td>
                        <td>{{ $diaoyan->opinions  }}</td>
                        <td>

                            {{--<a href="{{ route('diaoyan.edit', $diaoyan->id) }}" class="layui-btn layui-btn-sm layui-btn-normal">{{trans('global.edit')}}</a>--}}
                            <a href="javascript:;" data-url="{{ route('diaoyan.destroy', $diaoyan->id) }}" class="layui-btn layui-btn-sm layui-btn-danger form-delete">{{trans('global.delete')}}</a>
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

    @include(getThemeView('layouts._paginate'),[ 'count' => $diaoyans->total(), ])

@endsection

