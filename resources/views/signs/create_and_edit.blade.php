@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-edit"></i> Sign /
                    @if($sign->id)
                        Edit #{{$sign->id}}
                    @else
                        Create
                    @endif
                </h1>
            </div>

            @include('common.error')

            <div class="panel-body">
                @if($sign->id)
                    <form action="{{ route('signs.update', $sign->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('signs.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    
                <div class="form-group">
                    <label for="member_id-field">Member_id</label>
                    <input class="form-control" type="text" name="member_id" id="member_id-field" value="{{ old('member_id', $sign->member_id ) }}" />
                </div> 
                <div class="form-group">
                	<label for="sign_day-field">Sign_day</label>
                	<input class="form-control" type="text" name="sign_day" id="sign_day-field" value="{{ old('sign_day', $sign->sign_day ) }}" />
                </div> 
                <div class="form-group">
                	<label for="sign_month-field">Sign_month</label>
                	<input class="form-control" type="text" name="sign_month" id="sign_month-field" value="{{ old('sign_month', $sign->sign_month ) }}" />
                </div> 
                <div class="form-group">
                	<label for="sign_year-field">Sign_year</label>
                	<input class="form-control" type="text" name="sign_year" id="sign_year-field" value="{{ old('sign_year', $sign->sign_year ) }}" />
                </div> 
                <div class="form-group">
                	<label for="sign_year_month-field">Sign_year_month</label>
                	<input class="form-control" type="text" name="sign_year_month" id="sign_year_month-field" value="{{ old('sign_year_month', $sign->sign_year_month ) }}" />
                </div> 
                <div class="form-group">
                    <label for="sign_contiday-field">Sign_contiday</label>
                    <input class="form-control" type="text" name="sign_contiday" id="sign_contiday-field" value="{{ old('sign_contiday', $sign->sign_contiday ) }}" />
                </div> 
                <div class="form-group">
                    <label for="jifen-field">Jifen</label>
                    <input class="form-control" type="text" name="jifen" id="jifen-field" value="{{ old('jifen', $sign->jifen ) }}" />
                </div>

                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-link pull-right" href="{{ route('signs.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection