@extends('layout')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('main.header')
            </div>
        </div>
        <div class="row">
            <div class="offset-md-2 col-md-4">
                {!! Form::open(array('action' => 'AdminController@createUser', 'class' => 'needs-validation', 'novalidate' => 'novalidate')) !!}
                {{ Form::radio('result', 'citizen' , true) }}
                {{ Form::label('citizen', 'citizen of Belarus') }}
                {{ Form::radio('result', 'notacitizen' , false) }}
                {{ Form::label('citizen', 'not a citizen of Belarus') }}

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Login</span>
                    </div>
                    {!! Form::text('login', null, $attributes = $errors->has('login') ? array('class' => 'form-control alert-danger') : array('class' => 'form-control'))!!}
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Last Name</span>
                    </div>
                    {!! Form::text('lastName', null, $attributes = $errors->has('lastName') ? array('class' => 'form-control alert-danger') : array('class' => 'form-control'))!!}
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">First Name</span>
                    </div>
                    {!! Form::text('firstName', null, $attributes = $errors->has('firstName') ? array('class' => 'form-control alert-danger') : array('class' => 'form-control'))!!}
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Middle Name</span>
                    </div>
                    {!! Form::text('middleName', null, array('id' => 'inputmiddleName', 'class' => 'form-control'))!!}
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Passport Number</span>
                    </div>
                    {!! Form::text('numberPassport', null, $attributes = $errors->has('numberPassport') ? array('class' => 'form-control alert-danger') : array('class' => 'form-control'))!!}
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Identification Number</span>
                    </div>
                    {!! Form::text('identificationNumber', null, $attributes = $errors->has('identificationNumber') ? array('class' => 'form-control alert-danger') : array('class' => 'form-control'))!!}
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Phone Number</span>
                    </div>
                    {!! Form::text('phone', null, $attributes = $errors->has('phone') ? array('class' => 'form-control alert-danger') : array('class' => 'form-control'))!!}
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                    </div>
                    {!! Form::text('mail', null, $attributes = $errors->has('mail') ? array('class' => 'form-control alert-danger') : array('class' => 'form-control'))!!}
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Birthday</span>
                    </div>
                    {!! Form::date('birthday', null, $attributes = $errors->has('birthday') ? array('class' => 'form-control alert-danger') : array('class' => 'form-control'))!!}
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Currency</span>
                    </div>
                    {!! Form::select('currency', array('USD' => 'USD', 'EUR' => 'EUR', 'GBP' => 'GBP', 'BYN' => 'BYN'), 'BYN')!!}
                </div>

                {!! Form::submit('Create', ['class' => 'btn btn-primary btn-lg btn-block'])  !!}
                {!! Form::close() !!}
            </div>
            <div class="col-md-4">
                @include('errors')
            </div>
        </div>
    </div>
@endsection
