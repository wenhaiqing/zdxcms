@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Member / Show #{{ $member->id }}</h1>
            </div>

            <div class="panel-body">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-link" href="{{ route('members.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                        </div>
                        <div class="col-md-6">
                             <a class="btn btn-sm btn-warning pull-right" href="{{ route('members.edit', $member->id) }}">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>

                <label>User_id</label>
<p>
	{{ $member->user_id }}
</p> <label>Mobile</label>
<p>
	{{ $member->mobile }}
</p> <label>Name</label>
<p>
	{{ $member->name }}
</p> <label>Password</label>
<p>
	{{ $member->password }}
</p> <label>Sex</label>
<p>
	{{ $member->sex }}
</p> <label>Nation</label>
<p>
	{{ $member->nation }}
</p> <label>Cardnum</label>
<p>
	{{ $member->cardnum }}
</p> <label>Record</label>
<p>
	{{ $member->record }}
</p> <label>Age</label>
<p>
	{{ $member->age }}
</p> <label>If_dang</label>
<p>
	{{ $member->if_dang }}
</p> <label>If_movedang</label>
<p>
	{{ $member->if_movedang }}
</p> <label>Status</label>
<p>
	{{ $member->status }}
</p> <label>Remember_token</label>
<p>
	{{ $member->remember_token }}
</p>
            </div>
        </div>
    </div>
</div>

@endsection
