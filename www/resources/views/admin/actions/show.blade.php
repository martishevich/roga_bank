@extends('layout')

<div class="container">

{!! Form::macro('exit1', function () {
return '<input type="submit" value="block the card" name="block" class="btn btn-danger">';
});!!}

{!! Form::macro('exit2', function () {
return '<input type="submit" value="unlock" name="unlock" class="btn btn-primary">';
});!!}
{!! Form::macro('exit3', function () {
return '<input type="submit" value="block user" name="block_users" class="btn btn-danger">';
});!!}

{!! Form::macro('exit4', function () {
return '<input type="submit" value="unlock user" name="unlock_users" class="btn btn-primary">';
});!!}

<table class="table">
    <thead>
    <tr>
        <th scope="col">login</th>
        <th scope="col">lastName</th>
        <th scope="col">firstName</th>
        <th scope="col">middleName</th>
        <th scope="col">birthday</th>
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
        <th scope="col">numberPassport</th>
        <th scope="col">identificationNumber</th>
    </tr>
    <tr>
        <td>{{ $user->numberPassport }}</td>
        <td>{{ $user->identificationNumber }}</td>
    </tr>
    <tr>
        <th scope="col">phone number</th>
        <th scope="col">mail</th>
    </tr>
    <tr>
        <td>{{ $user->phone['0']->phone_number }}</td>
        <td>{{ $user->mail['0']->mail }}</td>
    </tr>
    <tr>
        <th scope="col">card number</th>
        <th scope="col">cvv number</th>
        <th scope="col">expiration date</th>
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
</table><br>


{!! Form::open(array('url' => 'adminPage/'.$user->id.'/show', 'method' => 'post'))!!}
{!! Form::exit1()!!}
{!! Form::exit2()!!}<br>
{!! Form::exit3()!!}
{!! Form::exit4()!!}
{!! Form::close()!!}


<a href="/adminPage">на страницу админа</a>



</div>
