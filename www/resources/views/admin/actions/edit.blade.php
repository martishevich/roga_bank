@extends('layout')
@section('content')

    <div class="container edit">
        <div class="row">
            <div class="col-md-12">
                @include('main.header')
            </div>
        </div>
        <div class="row">
            <div class="offset-md-2 col-md-4">
                {!! Form::open(['route' => ['user.edit', $user->id], 'method'=>'POST']) !!}
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Login</span>
                    </div>
                    {!! Form::text('login', $user->login, $attributes = $errors->has('login') ? array('class' => 'form-control alert-danger') : array('class' => 'form-control'))!!}
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
                    </div>
                    {!! Form::text('password', $user->password, $attributes = $errors->has('password') ? array('class' => 'form-control alert-danger') : array('class' => 'form-control'))!!}
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Last Name</span>
                    </div>
                    {!! Form::text('lastName', $user->lastName, $attributes = $errors->has('lastName') ? array('class' => 'form-control alert-danger') : array('class' => 'form-control'))!!}
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">First Name</span>
                    </div>
                    {!! Form::text('firstName', $user->firstName, $attributes = $errors->has('firstName') ? array('class' => 'form-control alert-danger') : array('class' => 'form-control'))!!}
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Middle Name</span>
                    </div>
                    {!! Form::text('middleName', $user->middleName, array('class' => 'form-control'))!!}
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Passport Number</span>
                    </div>
                    {!! Form::text('numberPassport', $user->numberPassport, $attributes = $errors->has('numberPassport') ? array('class' => 'form-control alert-danger') : array('class' => 'form-control'))!!}
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Identification Number</span>
                    </div>
                    {!! Form::text('identificationNumber', $user->identificationNumber, $attributes = $errors->has('identificationNumber') ? array('class' => 'form-control alert-danger') : array('class' => 'form-control'))!!}
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Phone Number</span>
                    </div>
                    {!! Form::text('phone', $user->phone['0']->phone_number, $attributes = $errors->has('phone') ? array('class' => 'form-control alert-danger') : array('class' => 'form-control'))!!}
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                    </div>
                    {!! Form::text('mail', $user->mail['0']->mail, $attributes = $errors->has('mail') ? array('class' => 'form-control alert-danger') : array('class' => 'form-control'))!!}
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Birthday</span>
                    </div>
                    {!! Form::text('birthday', $user->birthday, $attributes = $errors->has('birthday') ? array('class' => 'form-control alert-danger') : array('class' => 'form-control'))!!}
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Currency</span>
                    </div>
                    {!! Form::select('currency', array('USD' => 'USD', 'EUR' => 'EUR', 'GBP' => 'GBP', 'BYN' => 'BYN'), 'BYN')!!}
                </div>
                {!! Form::submit('Update', ['class' => 'btn btn-warning btn-lg btn-block'])  !!}
                {!! Form::close() !!}
            </div>
            <div class="col-md-4">
                @include('errors')
            </div>
        </div>
    </div>
@endsection
