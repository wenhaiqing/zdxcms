@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-align-justify"></i> Sign
                    <a class="btn btn-success pull-right" href="{{ route('signs.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
                </h1>
            </div>

            <div class="panel-body">
                @if($signs->count())
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Member_id</th> <th>Sign_day</th> <th>Sign_month</th> <th>Sign_year</th> <th>Sign_year_month</th> <th>Sign_contiday</th> <th>Jifen</th>
                                <th class="text-right">OPTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($signs as $sign)
                                <tr>
                                    <td class="text-center"><strong>{{$sign->id}}</strong></td>

                                    <td>{{$sign->member_id}}</td> <td>{{$sign->sign_day}}</td> <td>{{$sign->sign_month}}</td> <td>{{$sign->sign_year}}</td> <td>{{$sign->sign_year_month}}</td> <td>{{$sign->sign_contiday}}</td> <td>{{$sign->jifen}}</td>
                                    
                                    <td class="text-right">
                                        <a class="btn btn-xs btn-primary" href="{{ route('signs.show', $sign->id) }}">
                                            <i class="glyphicon glyphicon-eye-open"></i> 
                                        </a>
                                        
                                        <a class="btn btn-xs btn-warning" href="{{ route('signs.edit', $sign->id) }}">
                                            <i class="glyphicon glyphicon-edit"></i> 
                                        </a>

                                        <form action="{{ route('signs.destroy', $sign->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">

                                            <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $signs->render() !!}
                @else
                    <h3 class="text-center alert alert-info">Empty!</h3>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection