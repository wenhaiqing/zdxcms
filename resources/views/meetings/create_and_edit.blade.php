@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-edit"></i> Meeting /
                    @if($meeting->id)
                        Edit #{{$meeting->id}}
                    @else
                        Create
                    @endif
                </h1>
            </div>

            @include('common.error')

            <div class="panel-body">
                @if($meeting->id)
                    <form action="{{ route('meetings.update', $meeting->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('meetings.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    
                <div class="form-group">
                    <label for="user_id-field">User_id</label>
                    <input class="form-control" type="text" name="user_id" id="user_id-field" value="{{ old('user_id', $meeting->user_id ) }}" />
                </div> 
                <div class="form-group">
                	<label for="meeting_title-field">Meeting_title</label>
                	<input class="form-control" type="text" name="meeting_title" id="meeting_title-field" value="{{ old('meeting_title', $meeting->meeting_title ) }}" />
                </div> 
                <div class="form-group">
                	<label for="meeting_compere-field">Meeting_compere</label>
                	<input class="form-control" type="text" name="meeting_compere" id="meeting_compere-field" value="{{ old('meeting_compere', $meeting->meeting_compere ) }}" />
                </div> 
                <div class="form-group">
                	<label for="meeting_address-field">Meeting_address</label>
                	<input class="form-control" type="text" name="meeting_address" id="meeting_address-field" value="{{ old('meeting_address', $meeting->meeting_address ) }}" />
                </div> 
                <div class="form-group">
                	<label for="meeting_starttime-field">Meeting_starttime</label>
                	<input class="form-control" type="text" name="meeting_starttime" id="meeting_starttime-field" value="{{ old('meeting_starttime', $meeting->meeting_starttime ) }}" />
                </div> 
                <div class="form-group">
                	<label for="meeting_endtime-field">Meeting_endtime</label>
                	<input class="form-control" type="text" name="meeting_endtime" id="meeting_endtime-field" value="{{ old('meeting_endtime', $meeting->meeting_endtime ) }}" />
                </div> 
                <div class="form-group">
                    <label for="meeting_membercount-field">Meeting_membercount</label>
                    <input class="form-control" type="text" name="meeting_membercount" id="meeting_membercount-field" value="{{ old('meeting_membercount', $meeting->meeting_membercount ) }}" />
                </div> 
                <div class="form-group">
                	<label for="meeting_picture-field">Meeting_picture</label>
                	<textarea name="meeting_picture" id="meeting_picture-field" class="form-control" rows="3">{{ old('meeting_picture', $meeting->meeting_picture ) }}</textarea>
                </div> 
                <div class="form-group">
                	<label for="meeting_record-field">Meeting_record</label>
                	<input class="form-control" type="text" name="meeting_record" id="meeting_record-field" value="{{ old('meeting_record', $meeting->meeting_record ) }}" />
                </div> 
                <div class="form-group">
                    <label for="jifen-field">Jifen</label>
                    <input class="form-control" type="text" name="jifen" id="jifen-field" value="{{ old('jifen', $meeting->jifen ) }}" />
                </div>

                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-link pull-right" href="{{ route('meetings.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection