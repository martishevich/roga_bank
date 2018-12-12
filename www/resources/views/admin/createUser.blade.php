@extends('layout')

<div class="container">
    <div class="row">
        <div class="offset-md-2 col-md-4">
            {!! Form::open(array('action' => 'AdminController@createUser', 'class' => 'needs-validation', 'novalidate' => 'novalidate')) !!}
            {{--{!! Form::text('login', null, array('placeholder'=>'Login', 'id' => 'firstName', 'class' => 'form-control', 'required' => 'required'))!!}--}}

            <div class="col-md-6 mb-3">
                {!! Form::text('login', null, array('placeholder'=>'Login', 'id' => 'firstName', 'class' => 'form-control', 'required' => 'required'))!!}
                <div class="invalid-feedback">
                    Login is required
                </div>
            </div>

            {!! Form::password('password', array('placeholder'=>'Password', 'id' => 'password', 'class' => 'form-control'))!!}
            {!! Form::text('lastName', null, array('placeholder'=>'Last Name', 'class' => 'form-control'))!!}
            {!! Form::text('firstName', null, array('placeholder'=>'First Name', 'class' => 'form-control'))!!}
            {!! Form::text('middleName', null, array('placeholder'=>'Middle Name', 'class' => 'form-control'))!!}
            {!! Form::text('numberPassport', null, array('placeholder'=>'Passport Number', 'class' => 'form-control'))!!}
            {!! Form::text('identificationNumber', null, array('placeholder'=>'Identification Number', 'class' => 'form-control'))!!}
            {!! Form::text('phone', null, array('placeholder'=>'Phone Number', 'class' => 'form-control'))!!}
            {!! Form::text('mail', null, array('placeholder'=>'Email', 'class' => 'form-control'))!!}
            {!! Form::date('birthday', 'Birthday', ['class' => 'form-control', 'max' => '2018-12-11'])!!}
            <div class="form-control">
                {!! Form::label('currency', 'Select currency') !!}
                {!! Form::select('currency', array('USD' => 'USD', 'EUR' => 'EUR', 'GBP' => 'GBP', 'BYN' => 'BYN'), 'BYN')!!}
            </div>
            <br>
            {!! Form::submit('Create', ['class' => 'btn btn-primary btn-lg btn-block'])  !!}
            {!! Form::close() !!}
        </div>
        <div class="col-md-4">
            @include('errors')
        </div>
    </div>
</div>
