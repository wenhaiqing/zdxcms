@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Sign / Show #{{ $sign->id }}</h1>
            </div>

            <div class="panel-body">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-link" href="{{ route('signs.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                        </div>
                        <div class="col-md-6">
                             <a class="btn btn-sm btn-warning pull-right" href="{{ route('signs.edit', $sign->id) }}">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>

                <label>Member_id</label>
<p>
	{{ $sign->member_id }}
</p> <label>Sign_day</label>
<p>
	{{ $sign->sign_day }}
</p> <label>Sign_month</label>
<p>
	{{ $sign->sign_month }}
</p> <label>Sign_year</label>
<p>
	{{ $sign->sign_year }}
</p> <label>Sign_year_month</label>
<p>
	{{ $sign->sign_year_month }}
</p> <label>Sign_contiday</label>
<p>
	{{ $sign->sign_contiday }}
</p> <label>Jifen</label>
<p>
	{{ $sign->jifen }}
</p>
            </div>
        </div>
    </div>
</div>

@endsection
