@extends('app')


@section('content')

    <h1 class="page-heading">Prepare a Basic Form</h1>

    {!! Form::open(['method'=> 'GET', 'action' => 'NoticesController@confirm']) !!}

    <!--Receiver_id Form Input -->
    <div class="form-group">
        {!! Form::label('receiver_id','Who do you want to send this to?') !!}
        {!! Form::select('receiver_id',$receivers,null,['class' => 'form-control']) !!}
    </div>

    <!--Sender_title Form Input -->
    <div class="form-group">
        {!! Form::label('sender_title','Please enter your name:') !!}
        {!! Form::text('sender_title',null,['class' => 'form-control']) !!}
    </div>

    <!--Sender_age Form Input -->
    <div class="form-group">
        {!! Form::label('sender_age','Please enter your age:') !!}
        {!! Form::text('sender_age',null,['class' => 'form-control']) !!}
    </div>

    <!--Edu_qual Form Input -->
    <div class="form-group">
        {!! Form::label('edu_qual','Please specify your Highest Educational Qualification:') !!}
        {!! Form::text('edu_qual',null,['class' => 'form-control']) !!}
    </div>

    <!--Description Form Input -->
    <div class="form-group">
        {!! Form::label('description','What do you do to support your family:') !!}
        {!! Form::textarea('description',null,['class' => 'form-control']) !!}
    </div>

    <!--Form Input -->
    <div class="form-group">
        {!! Form::submit('Submit Form',['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}

    @include('errors.list')

@endsection