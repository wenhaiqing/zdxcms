@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-align-justify"></i> Meeting
                    <a class="btn btn-success pull-right" href="{{ route('meetings.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
                </h1>
            </div>

            <div class="panel-body">
                @if($meetings->count())
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>User_id</th> <th>Meeting_title</th> <th>Meeting_compere</th> <th>Meeting_address</th> <th>Meeting_starttime</th> <th>Meeting_endtime</th> <th>Meeting_membercount</th> <th>Meeting_picture</th> <th>Meeting_record</th> <th>Jifen</th>
                                <th class="text-right">OPTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($meetings as $meeting)
                                <tr>
                                    <td class="text-center"><strong>{{$meeting->id}}</strong></td>

                                    <td>{{$meeting->user_id}}</td> <td>{{$meeting->meeting_title}}</td> <td>{{$meeting->meeting_compere}}</td> <td>{{$meeting->meeting_address}}</td> <td>{{$meeting->meeting_starttime}}</td> <td>{{$meeting->meeting_endtime}}</td> <td>{{$meeting->meeting_membercount}}</td> <td>{{$meeting->meeting_picture}}</td> <td>{{$meeting->meeting_record}}</td> <td>{{$meeting->jifen}}</td>
                                    
                                    <td class="text-right">
                                        <a class="btn btn-xs btn-primary" href="{{ route('meetings.show', $meeting->id) }}">
                                            <i class="glyphicon glyphicon-eye-open"></i> 
                                        </a>
                                        
                                        <a class="btn btn-xs btn-warning" href="{{ route('meetings.edit', $meeting->id) }}">
                                            <i class="glyphicon glyphicon-edit"></i> 
                                        </a>

                                        <form action="{{ route('meetings.destroy', $meeting->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">

                                            <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $meetings->render() !!}
                @else
                    <h3 class="text-center alert alert-info">Empty!</h3>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection