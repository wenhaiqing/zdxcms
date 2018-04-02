@extends(getThemeView('layouts.main'))


@section('content')

		<form class="layui-form layui-form-pane" method="POST" action="{{ route('zdxadmin.password.update', Auth::user()->id)  }}">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">

			<div class="layui-form-item">
				<label class="layui-form-label">{{trans('passwords.old_password')}}</label>
				<div class="layui-input-block">
					<input type="password" name="old_password" lay-verify="required" autocomplete="off" placeholder="{{trans('passwords.old_password')}}" class="layui-input" value="{{ old('old_password') }}" >
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">{{trans('passwords.new_password')}}</label>
				<div class="layui-input-block">
					<input type="password" name="password" lay-verify="required" placeholder="{{trans('passwords.new_password')}}" autocomplete="off" class="layui-input" value="{{ old("password")  }}" >
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">{{trans('passwords.new_password_confirm')}}</label>
				<div class="layui-input-block">
					<input type="password" name="password_confirmation" lay-verify="required" placeholder="{{trans('passwords.new_password_confirm')}}" autocomplete="off" class="layui-input" value="{{ old("password_confirmation") }}" >
				</div>
			</div>

			<div class="layui-form-item">
				{{--<div class="layui-input-block">--}}
				<button class="layui-btn" lay-submit="" lay-filter="demo1">{{trans('global.submit')}}</button>
				<button type="reset" class="layui-btn layui-btn-primary">{{trans('global.reset')}}</button>
				{{--</div>--}}
			</div>
		</form>
@endsection
@section('js')

	@include(getThemeView('layouts._paginate'),[ 'count' => 1])
@endsection