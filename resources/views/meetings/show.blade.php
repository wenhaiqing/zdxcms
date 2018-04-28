@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Meeting / Show #{{ $meeting->id }}</h1>
            </div>

            <div class="panel-body">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-link" href="{{ route('meetings.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                        </div>
                        <div class="col-md-6">
                             <a class="btn btn-sm btn-warning pull-right" href="{{ route('meetings.edit', $meeting->id) }}">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>

                <label>User_id</label>
<p>
	{{ $meeting->user_id }}
</p> <label>Meeting_title</label>
<p>
	{{ $meeting->meeting_title }}
</p> <label>Meeting_compere</label>
<p>
	{{ $meeting->meeting_compere }}
</p> <label>Meeting_address</label>
<p>
	{{ $meeting->meeting_address }}
</p> <label>Meeting_starttime</label>
<p>
	{{ $meeting->meeting_starttime }}
</p> <label>Meeting_endtime</label>
<p>
	{{ $meeting->meeting_endtime }}
</p> <label>Meeting_membercount</label>
<p>
	{{ $meeting->meeting_membercount }}
</p> <label>Meeting_picture</label>
<p>
	{{ $meeting->meeting_picture }}
</p> <label>Meeting_record</label>
<p>
	{{ $meeting->meeting_record }}
</p> <label>Jifen</label>
<p>
	{{ $meeting->jifen }}
</p>
            </div>
        </div>
    </div>
</div>

@endsection
