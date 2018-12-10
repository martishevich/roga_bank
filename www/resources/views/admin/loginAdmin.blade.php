@extends('layout')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            {!! Form::open(array('class' => 'needs-validation', 'action' => 'AdminController@loginAdmin', 'novalidate' => 'novalidate')) !!}
            <h1 class="h3 mb-3 font-weight-normal">Sign in for user</h1>
            <div class="row">
                <div class="col-md-6 mb-3">
                    {!! Form::text('login', null, array('required' => 'required', 'placeholder'=>'Login', 'id' => 'firstName', 'class' => 'form-control'))!!}
                    <div class="invalid-feedback">
                        Login field is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    {!! Form::password('password', array('required' => 'required', 'placeholder'=>'Password', 'id' => 'password', 'class' => 'form-control'))!!}
                    <div class="invalid-feedback">
                        Password field is required.
                    </div>
                </div>
            </div>
            {!! Form::submit('Sign in', ['class' => 'btn btn-primary btn-lg btn-block'])  !!}
            {!! Form::close() !!}
        </div>
        @include('errors')
    </div>
</div>




