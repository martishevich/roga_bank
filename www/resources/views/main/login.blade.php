@extends('layoute')

@section('content')
    {!!  Form::open(/*array('action' => 'Controller@method')*/) !!}
    {!!  Form::text('username', 'ваш никнейм')!!}
    {!!  Form::close() !!}
     {{--echoForm::open(array('action' => 'Controller@method'))
    {{Form::text('username', 'ваш никнейм')}}
    {!!  Form::close() !!}--}}
@endsection