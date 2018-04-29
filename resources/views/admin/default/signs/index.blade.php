@extends(getThemeView('layouts.main'))

@php
    $keyword = request('keyword', '');
@endphp
@section('content')
    <blockquote class="layui-elem-quote news_search">

    </blockquote>


    <div class="layui-form">
        @if($signs->count())
            <table class="layui-table">
                <colgroup>
                    <col width="50">
                    <col>
                    <col>
                    <col>
                    <col>
                    <col width="300">
                </colgroup>
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{trans('signs.name')}}</th>
                    <th>{{trans('signs.signcount')}}</th>
                    <th>{{trans('signs.lastsign')}}</th>
                    <th>{{trans('signs.contiday')}}</th>
                    <th>{{trans('global.operation')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($signs as $index => $sign)
                    <tr>
                        <td>{{$sign->id}}</td>
                        <td>{{ $sign->member->name }}</td>
                        <td>{{ $signs->count()}}</td>
                        <td>{{ $sign->sign_time }}</td>
                        <td>{{ $sign->contiday  }}</td>
                        <td>
                            <a href="{{ route('signs.edit', $sign->id) }}" class="layui-btn layui-btn-sm layui-btn-normal">{{trans('global.edit')}}</a>
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

    @include(getThemeView('layouts._paginate'),[ 'count' => $signs->total(), ])
@endsection

