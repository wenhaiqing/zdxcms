@extends(getThemeView('layouts.main'))

@section('content')
    <blockquote class="layui-elem-quote news_search">
        <div class="layui-inline">
            <a href="{{ route('wechats.create') }}" class="layui-btn">{{trans('global.add')}}</a>
        </div>
    </blockquote>

        <div class="layui-form">
            @if($wechats->count())
            <form name="form-list" id="form-list" class="layui-form layui-form-pane" method="POST" action="{{route('wechats.order')}}">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                <table class="layui-table">
                    <colgroup>
                        <col width="50">
                        <col width="">
                        <col>
                        <col>
                        <col>
                        <col width="600">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>#</th>
                        {{--<th>排序</th>--}}
                        <th>{{trans('wechat.wechat_name')}}</th>
                        <th>{{trans('wechat.wechat_type')}}</th>
                        <th>{{trans('wechat.wechat_old_id')}}</th>
                        <th>{{trans('wechat.wechat_appid')}}</th>
                        <th>{{trans('global.operation')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($wechats as $index => $wechat)
                        <tr>
                            <td>{{ $wechat->id }}</td>
                            {{--<td>--}}
                                {{--<input type="hidden" name="id[]" value="{{$wechat->id}}">--}}
                                {{--<input type="tel" name="order[]" lay-verify="required" autocomplete="off" class="layui-input" value="{{ $wechat->order  }}">--}}
                            {{--</td>--}}
                            <td>{{$wechat->name}}</td>
                            <td>@if($wechat->type == 'subscribe') {{trans('wechat.subscribe')}} @else {{trans('service')}} @endif</td>
                            <td>{{$wechat->account}}</td>
                            <td>{{$wechat->app_id}}</td>
                            <td>
                                <a href="{{ route('wechats.edit', $wechat->id) }}" class="layui-btn layui-btn-sm layui-btn-normal">{{trans('global.edit')}}</a>
                                <a href="{{ route('wechat_menus.index', $wechat->id) }}" class="layui-btn layui-btn-sm">{{trans('global.menu')}}</a>
                                <a href="{{ route('wechat_response.index', $wechat->id) }}" class="layui-btn layui-btn-sm layui-btn-normal">{{trans('global.keyword')}}</a>
                                <a href="{{ route('wechat_response.set_response.create', [$wechat->id, 'default']) }}" class="layui-btn layui-btn-sm layui-btn-normal">{{trans('wechat.default_response')}}</a>
                                {{--<a href="{{ route('wechat_response.set_response.create', [$wechat->id, 'subscribe']) }}" class="layui-btn layui-btn-sm layui-btn-normal">订阅响应</a>--}}
                                <a href="{{ route('wechats.integrate', $wechat->id) }}" class="layui-btn layui-btn-sm layui-btn-warm">{{trans('wechat.integrate')}}</a>
                                {{--<a href="{{ route('wechats.edit', $wechat->id) }}" class="layui-btn layui-btn-sm layui-btn-normal">二维码</a>--}}
                                <a href="javascript:;" data-url="{{ route('wechats.destroy', $wechat->id) }}" class="layui-btn layui-btn-sm layui-btn-danger form-delete">{{trans('global.delete')}}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </form>
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
    @include(getThemeView('layouts._paginate'),[ 'count' => $wechats->total(), ])
@endsection