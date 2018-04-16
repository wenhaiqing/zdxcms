@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-edit"></i> Member /
                    @if($member->id)
                        Edit #{{$member->id}}
                    @else
                        Create
                    @endif
                </h1>
            </div>

            @include('common.error')

            <div class="panel-body">
                @if($member->id)
                    <form action="{{ route('members.update', $member->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('members.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    
                <div class="form-group">
                    <label for="user_id-field">User_id</label>
                    <input class="form-control" type="text" name="user_id" id="user_id-field" value="{{ old('user_id', $member->user_id ) }}" />
                </div> 
                <div class="form-group">
                	<label for="mobile-field">Mobile</label>
                	<input class="form-control" type="text" name="mobile" id="mobile-field" value="{{ old('mobile', $member->mobile ) }}" />
                </div> 
                <div class="form-group">
                	<label for="name-field">Name</label>
                	<input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $member->name ) }}" />
                </div> 
                <div class="form-group">
                	<label for="password-field">Password</label>
                	<input class="form-control" type="text" name="password" id="password-field" value="{{ old('password', $member->password ) }}" />
                </div> 
                <div class="form-group">
                    <label for="sex-field">Sex</label>
                    <input class="form-control" type="text" name="sex" id="sex-field" value="{{ old('sex', $member->sex ) }}" />
                </div> 
                <div class="form-group">
                	<label for="nation-field">Nation</label>
                	<input class="form-control" type="text" name="nation" id="nation-field" value="{{ old('nation', $member->nation ) }}" />
                </div> 
                <div class="form-group">
                	<label for="cardnum-field">Cardnum</label>
                	<input class="form-control" type="text" name="cardnum" id="cardnum-field" value="{{ old('cardnum', $member->cardnum ) }}" />
                </div> 
                <div class="form-group">
                	<label for="record-field">Record</label>
                	<input class="form-control" type="text" name="record" id="record-field" value="{{ old('record', $member->record ) }}" />
                </div> 
                <div class="form-group">
                    <label for="age-field">Age</label>
                    <input class="form-control" type="text" name="age" id="age-field" value="{{ old('age', $member->age ) }}" />
                </div> 
                <div class="form-group">
                    <label for="if_dang-field">If_dang</label>
                    <input class="form-control" type="text" name="if_dang" id="if_dang-field" value="{{ old('if_dang', $member->if_dang ) }}" />
                </div> 
                <div class="form-group">
                    <label for="if_movedang-field">If_movedang</label>
                    <input class="form-control" type="text" name="if_movedang" id="if_movedang-field" value="{{ old('if_movedang', $member->if_movedang ) }}" />
                </div> 
                <div class="form-group">
                    <label for="status-field">Status</label>
                    <input class="form-control" type="text" name="status" id="status-field" value="{{ old('status', $member->status ) }}" />
                </div> 
                <div class="form-group">
                	<label for="remember_token-field">Remember_token</label>
                	<input class="form-control" type="text" name="remember_token" id="remember_token-field" value="{{ old('remember_token', $member->remember_token ) }}" />
                </div>

                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-link pull-right" href="{{ route('members.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection