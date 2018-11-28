@extends('repairLayout')

@section('content')
    <h2>Rapair Request Form</h2>
    {!! Form::open(['action' => 'RepairController@store','method' => 'POST']) !!}
    <div class="row">
        <div class="form-group col-6">
            {{Form::label('name','Name')}}
            {{Form::text('name','',['class' => 'form-control','placeholder' => 'Name'])}}
        </div>
        <div class="form-group col-6" >
            {{Form::label('email','Email')}}
            {{Form::text('email','',['class' => 'form-control','placeholder' => 'Email'])}}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-6">
            {{Form::label('roomNumber','Room Number')}}
            {{Form::text('roomNumber','',['class' => 'form-control','placeholder' => 'Room Number'])}}
        </div>
        <div class="form-group col-6">
            {{Form::label('phone','Phone Number')}}
            {{Form::number('phone','',['class' => 'form-control','placeholder' => 'Phone Number'])}}
        </div>
    </div>

    <div class="form-group">
        {{Form::label('repairTitle','Request')}}
        {{Form::text('repairTitle','',['class' => 'form-control','placeholder' => 'How can we help you?'])}}
    </div>
    <div class="form-group">
        {{Form::label('repairTime','Please visit at')}}
        {{Form::date('repairTime','',['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('repairDetail','Request Detail')}}
        {{Form::textarea('repairDetail','',['class' => 'form-control',
        'placeholder' => 'Please describe the detail'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}


    {!! Form::close() !!}
@endsection