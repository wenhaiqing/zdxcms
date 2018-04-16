@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-align-justify"></i> Member
                    <a class="btn btn-success pull-right" href="{{ route('members.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
                </h1>
            </div>

            <div class="panel-body">
                @if($members->count())
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>User_id</th> <th>Mobile</th> <th>Name</th> <th>Password</th> <th>Sex</th> <th>Nation</th> <th>Cardnum</th> <th>Record</th> <th>Age</th> <th>If_dang</th> <th>If_movedang</th> <th>Status</th> <th>Remember_token</th>
                                <th class="text-right">OPTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <td class="text-center"><strong>{{$member->id}}</strong></td>

                                    <td>{{$member->user_id}}</td> <td>{{$member->mobile}}</td> <td>{{$member->name}}</td> <td>{{$member->password}}</td> <td>{{$member->sex}}</td> <td>{{$member->nation}}</td> <td>{{$member->cardnum}}</td> <td>{{$member->record}}</td> <td>{{$member->age}}</td> <td>{{$member->if_dang}}</td> <td>{{$member->if_movedang}}</td> <td>{{$member->status}}</td> <td>{{$member->remember_token}}</td>
                                    
                                    <td class="text-right">
                                        <a class="btn btn-xs btn-primary" href="{{ route('members.show', $member->id) }}">
                                            <i class="glyphicon glyphicon-eye-open"></i> 
                                        </a>
                                        
                                        <a class="btn btn-xs btn-warning" href="{{ route('members.edit', $member->id) }}">
                                            <i class="glyphicon glyphicon-edit"></i> 
                                        </a>

                                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">

                                            <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $members->render() !!}
                @else
                    <h3 class="text-center alert alert-info">Empty!</h3>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection