@extends('layout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('main.header')
            </div>
        </div>


        {!! Form::macro('exit1', function () {
        return '<input type="submit" value="block the card" name="block" class="btn btn-danger block">';
        });!!}

        {!! Form::macro('exit2', function () {
        return '<input type="submit" value="unlock" name="unlock" class="btn btn-primary block">';
        });!!}


        {!! Form::macro('exit3', function () {
        return '<input type="submit" value="block user" name="block_users" class="btn btn-danger unlock">';
        });!!}

        {!! Form::macro('exit4', function () {
        return '<input type="submit" value="unlock user" name="unlock_users" class="btn btn-primary unlock">';
        });!!}


        <table class="table">
            <thead>
            <tr>
                <th scope="col">Login</th>
                <th scope="col">Last Name</th>
                <th scope="col">First Name</th>
                <th scope="col">Middle Name</th>
                <th scope="col">Birthday</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $user->login }}</td>
                <td>{{ $user->lastName }}</td>
                <td>{{ $user->firstName }}</td>
                <td>{{ $user->middleName }}</td>
                <td>{{ $user->birthday }}</td>
            </tr>
            <tr>
                <th scope="col">Passport number</th>
                <th scope="col">Identification number</th>
                <th scope="col">Phone number</th>
                <th scope="col">Email</th>
            </tr>
            <tr>
                <td>{{ $user->numberPassport }}</td>
                <td>{{ $user->identificationNumber }}</td>
                <td>{{ $user->phone['0']->phone_number }}</td>
                <td>{{ $user->mail['0']->mail }}</td>
            </tr>
            <tr>
                <th scope="col">Card number</th>
                <th scope="col">CVV number</th>
                <th scope="col">Expiration date</th>
            </tr>
            <tr>
                <td>{{ $user->account_card['0']->card_number }}</td>
                <td>{{ $user->account_card['0']->CVV }}</td>
                <td>{{ $user->account_card['0']->expiration_date }}</td>
            </tr>
            <tr>
                <th scope="col">User status</th>
                <th scope="col">Card status</th>
            </tr>
            <tr>
                <td>{{ $user->userStatus->last()->userStatus->name_status_user }}</td>
                <td>{{ $user->cardStatus->last()->nameStatus->name_status }}</td>
            </tr>
            </tbody>
        </table>
        <br>

        {!! Form::open(array('url' => 'adminPage/'.$user->id.'/show', 'method' => 'post'))!!}
        {!! Form::exit1()!!}
        {!! Form::exit2()!!}<br>
        {!! Form::exit3()!!}
        {!! Form::exit4()!!}
        {!! Form::close()!!}

        <a href="/adminPage">to admin page</a>

    </div>
@endsection
