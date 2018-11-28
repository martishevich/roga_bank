{{--@extends('layout')


@section('content')--}}

{!! Form::macro('exit1', function () {
return '<input type="submit" value="exit" name="submit">';
});!!}
 вы успешно авторизировались
{{--@endsection--}}
<?php  echo $loginOk->login;?>
{!!  Form::open(array('action' => 'UserController@userPage')) !!}
{!! Form::exit1()  !!}
{!!  Form::close() !!}
