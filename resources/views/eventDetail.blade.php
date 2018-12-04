@extends('layout')

@section('index-content')
    <div class="form-group">
    <div class="card shadow p-3 mb-5 bg-white rounded">
        <h1>{{$events->eventTitle}}</h1>

        <br>
        <h2>Event Detail</h2>
        <div class="card-body">
            {{$events->eventDes}}
        </div>
        <br>
       <table class="table">
           <tbody>
            <tb>{{$events->eventAddress}}</tb>
            <tb>{{$events->eventDate}}</tb>
           </tbody>
       </table>
    </div>

    <button type="button" class="btn btn-dark" onclick="window.location.href='/event'">Back</button>
    </div>

@endsection