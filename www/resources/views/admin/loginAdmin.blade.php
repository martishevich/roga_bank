{{--@extends('layout')

@section('content')--}}
    {!!  Form::open(array('action' => 'AdminController@loginAdmin')) !!}
    {!! Form::label('login', 'Login'); !!}
    {!!  Form::text('login')!!}
    {!! Form::label('password', 'Password'); !!}
    {!!  Form::password('password')!!}
    {!! Form::submit('Админ Нажми меня!')  !!}
    {!!  Form::close() !!}


@include('errors')


{{--
@endsection--}}
