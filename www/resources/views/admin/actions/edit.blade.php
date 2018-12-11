@extends('layout')

<div class="container edit">
    <div class="row">
        <div class="offset-md-2 col-md-4">
            {!! Form::open(['route' => ['user.edit', $user->id], 'method'=>'POST']) !!}
            {!! Form::text('login', $user->login, array('class' => 'form-control'))!!}
            {!! Form::text('password', $user->password, array('class' => 'form-control'))!!}
            {!! Form::text('lastName', $user->lastName, array('class' => 'form-control'))!!}
            {!! Form::text('firstName', $user->firstName, array('class' => 'form-control'))!!}
            {!! Form::text('middleName', $user->middleName, array('class' => 'form-control'))!!}
            {!! Form::text('numberPassport', $user->numberPassport, array('class' => 'form-control'))!!}
            {!! Form::text('identificationNumber', $user->identificationNumber, array('class' => 'form-control'))!!}
            {!! Form::text('phone', $user->phone['0']->phone_number, array('class' => 'form-control'))!!}
            {!! Form::text('mail', $user->mail['0']->mail, array('class' => 'form-control'))!!}
            {!! Form::date('birthday', $user->birthday, array('class' => 'form-control'))!!}
            <div class="form-control">
                {!! Form::label('currency', 'Select currency') !!}
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
