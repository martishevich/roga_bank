{!! Form::macro('exit1', function () {
return '<input type="submit" value="block the card" name="block">';
});!!}

{!! Form::macro('exit2', function () {
return '<input type="submit" value="unlock" name="unlock">';
});!!}
{!! Form::macro('exit3', function () {
return '<input type="submit" value="block user" name="block_users">';
});!!}

{!! Form::macro('exit4', function () {
return '<input type="submit" value="unlock user" name="unlock_users">';
});!!}

<table>
    <tr>
        <td>login</td>
        <td>lastName</td>
        <td>firstName</td>
        <td>middleName</td>
        <td>birthday</td>
    </tr>
    <tr>
        <td>{{ $user->login }}</td>
        <td>{{ $user->lastName }}</td>
        <td>{{ $user->firstName }}</td>
        <td>{{ $user->middleName }}</td>
        <td>{{ $user->birthday }}</td>
    </tr>
    <tr>
        <td>numberPassport</td>
        <td>identificationNumber</td>
    </tr>
    <tr>
        <td>{{ $user->numberPassport }}</td>
        <td>{{ $user->identificationNumber }}</td>
    </tr>
    <tr>
        <td>phone number</td>
        <td>mail</td>
    </tr>
    <tr>
        <td>{{ $user->phone['0']->phone_number }}</td>
        <td>{{ $user->mail['0']->mail }}</td>
    </tr>
    <tr>
        <td>card number</td>
        <td>cvv number</td>
        <td>expiration date</td>
    </tr>
    <tr>
        <td>{{ $user->account_card['0']->card_number }}</td>
        <td>{{ $user->account_card['0']->CVV }}</td>
        <td>{{ $user->account_card['0']->expiration_date }}</td>
    </tr>
    <tr>
        <td>User status</td>
        <td>Card status</td>
    </tr>
    <tr>
        <td>{{ $user->userStatus->last()->userStatus->name_status_user }}</td>
        <td>{{ $user->cardStatus->last()->nameStatus->name_status }}</td>
    </tr>

</table><br>


{!! Form::open(array('url' => 'adminPage/'.$user->id.'/show', 'method' => 'post'))!!}
{!! Form::exit1()!!}
{!! Form::exit2()!!}<br>
{!! Form::exit3()!!}
{!! Form::exit4()!!}
{!! Form::close()!!}


<a href="/adminPage">на страницу админа</a>



