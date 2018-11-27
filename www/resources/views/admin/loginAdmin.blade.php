{{--@extends('layout')

@section('content')--}}
    {!!  Form::open(array('action' => 'AdminController@loginAdmin')) !!}
    {!! Form::label('login', 'Login'); !!}
    {!!  Form::text('login')!!}
    {!! Form::label('password', 'Password'); !!}
    {!!  Form::password('password')!!}
    {!! Form::submit('Админ Нажми меня!')  !!}
    {!!  Form::close() !!}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
{{--
@endsection--}}
