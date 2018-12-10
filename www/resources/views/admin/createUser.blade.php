@extends('layout')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            {!! Form::open(array('action' => 'AdminController@createUser')) !!}
            {!! Form::text('login', null, array('placeholder'=>'Login', 'class' => 'form-control'))!!}
            {!! Form::password('password', array('placeholder'=>'Password', 'id' => 'password', 'class' => 'form-control'))!!}
            {!! Form::text('lastName', null, array('placeholder'=>'Last Name', 'class' => 'form-control'))!!}
            {!! Form::text('firstName', null, array('placeholder'=>'First Name', 'class' => 'form-control'))!!}
            {!! Form::text('middleName', null, array('placeholder'=>'Middle Name', 'class' => 'form-control'))!!}
            {!! Form::text('numberPassport', null, array('placeholder'=>'Passport Number', 'class' => 'form-control'))!!}
            {!! Form::text('identificationNumber', null, array('placeholder'=>'Identification Number', 'class' => 'form-control'))!!}
            {!! Form::text('phone', null, array('placeholder'=>'Phone Number', 'class' => 'form-control'))!!}
            {!! Form::text('mail', null, array('placeholder'=>'Email', 'class' => 'form-control'))!!}
            {!! Form::date('birthday', 'Birthday', ['class' => 'form-control'])!!}
            {!! Form::label('currency', 'Select currency') !!}
            {!! Form::select('currency', array('USD' => 'USD', 'EUR' => 'EUR', 'GBP' => 'GBP', 'BYN' => 'BYN'), 'BYN')!!}<br>
            {!! Form::submit('Create')  !!}
            {!! Form::close() !!}
        </div>
        @include('errors')
    </div>
</div>


