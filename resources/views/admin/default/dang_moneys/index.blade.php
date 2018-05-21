@extends(getThemeView('layouts.main'))

@php
    $keyword = request('keyword', '');
@endphp
@section('content')
    <blockquote class="layui-elem-quote news_search">
        <form class="layui-form layui-form-pane" method="GET" action="">
        <div class="layui-inline">
            <a href="{{ route('dang_moneys.create') }}" class="layui-btn">{{trans('global.add')}}</a>
        </div>
        <div style="float: right;">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">{{trans('dangmoney.name')}}</label>
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
        @if($dang_moneys->count())
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
                    <th>{{trans('dangmoney.name')}}</th>
                    <th>{{trans('dangmoney.salary')}}</th>
                    <th>{{trans('dangmoney.paymoney')}}</th>
                    <th>{{trans('dangmoney.paytime')}}</th>
                    <th>{{trans('dangmoney.status')}}</th>
                    <th>{{trans('dangmoney.paytype')}}</th>
                    <th>{{trans('global.operation')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dang_moneys as $index => $dangmoney)
                    <tr>
                        <td>{{ $dangmoney->id }}</td>
                        <td>{{ $dangmoney->name  }}</td>
                        <td>{{ $dangmoney->salary  }}</td>
                        <td>{{ $dangmoney->paymoney  }}</td>
                        <td>{{ $dangmoney->paytime }}</td>
                        <td>@switch($dangmoney->status)
                                @case(0) 未确定 @break
                                @case(1) 已确定 @break
                                @endswitch
                        </td>
                        <td>@switch($dangmoney->paytype)
                                @case(0) 正常缴纳 @break
                                @case(1) 补交党费 @break
                            @endswitch
                        </td>
                        <td>
                            <a href="{{ route('dang_moneys.edit', $dangmoney->id) }}" class="layui-btn layui-btn-sm layui-btn-normal">{{trans('global.edit')}}</a>
                            <a href="javascript:;" data-url="{{ route('dang_moneys.destroy', $dangmoney->id) }}" class="layui-btn layui-btn-sm layui-btn-danger form-delete">{{trans('global.delete')}}</a>
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

    @include(getThemeView('layouts._paginate'),[ 'count' => $dang_moneys->total(), ])
@endsection

