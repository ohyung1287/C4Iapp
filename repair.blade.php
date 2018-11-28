@extends('layout')

@section('content')
    <div class="alert alert-warning" role="alert">
        You have some repair requests—check it out!
    </div>
    <br>
    @if(count($repairs) > 1)
        @foreach($repairs as $repair)

            <div class="list-group-item shadow p-3 mb-5 bg-white rounded">
                <h3><a href="/repair/{{$repair->id}}">{{$repair->repairTitle}}</a></h3>
                <p class="text-secondary">{{$repair->repairDetail}}</p>
                <br>
                <div  class="text-info">
                    <small>Room number:  {{$repair->roomNumber}} </small>
                    <br>
                    <small>Reported at:  {{$repair->created_at}} </small>
                </div>
            </div>
        @endforeach


    @else
        <p>No repair request</p>
    @endif
@endsection