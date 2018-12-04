{{--@extends('layout')

@section('content')--}}
    {!! Form::open(array('action' => 'UserController@login')) !!}
    {!! Form::label('login', 'User'); !!}
    {!! Form::text('login')!!}
    {!! Form::label('password', 'Password'); !!}
    {!! Form::password('password')!!}
    {!! Form::submit('Нажми меня!')  !!}
    {!! Form::close() !!}

@include('errors')

{{--@endsection--}}
