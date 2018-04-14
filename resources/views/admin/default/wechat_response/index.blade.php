@extends(getThemeView('layouts.main'))
@section('content')

        <a href="{{ route('wechat_response.create', [$wechat->id, 0]) }}" class="layui-btn">{{trans('global.add')}}</a>
        {{--<button class="layui-btn layui-btn-danger" form="form-list">排序</button>--}}

        <div class="layui-form">
            @if($wechat_responses->count())
            <form name="form-list" id="form-list" class="layui-form layui-form-pane" method="POST" action="">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
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
                        <th>{{trans('wechatmenu.name')}}</th>
                        <th>{{trans('wechatmenu.type')}}</th>
                        <th>{{trans('wechatmenu.val')}}</th>
                        <th>{{trans('global.operation')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($wechat_responses as $index => $wechat_response)
                        <tr>
                            <td>{{ $wechat_response->id }}</td>
                            <td>{{$wechat_response->key}}</td>
                            <td>@switch($wechat_response->type)
                                    @case('text') {{trans('wechatmenu.text')}} @break
                                    @case('link') {{trans('wechatmenu.url')}} @break
                                    @case('news') {{trans('wechatmenu.picture')}} @break
                                @endswitch</td>
                            <td>@switch($wechat_response->type)
                                    @case('text') {{get_json_params($wechat_response->content,'text')}} @break
                                    @case('link') {{get_json_params($wechat_response->content,'link')}} @break
                                    @case('news') {{trans('wechatmenu.topic')}}：{{get_json_params($wechat_response->content,'category_name')}} @break
                                @endswitch</td>
                            <td>
                                <a href="{{ route('wechat_response.edit', [$wechat_response->id, $wechat_response->wechat_id]) }}" class="layui-btn layui-btn-sm layui-btn-normal">{{trans('global.edit')}}</a>
                                <a href="javascript:;" data-url="{{ route('wechat_response.destroy', [$wechat_response->id, $wechat_response->wechat_id]) }}" class="layui-btn layui-btn-sm layui-btn-danger form-delete">{{trans('global.delete')}}</a>
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
    @include(getThemeView('layouts._paginate'),[ 'count' => $wechat_responses->count(), ])
@endsection