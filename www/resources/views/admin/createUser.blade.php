@include('errors')

{!! Form::open(array('action' => 'AdminController@createUser')) !!}
{!! Form::label('login', 'Login'); !!}<br>
{!! Form::text('login')!!}<br>
{!! Form::label('password', 'Password'); !!}<br>
{!! Form::password('password')!!}<br>
{!! Form::label('lastName', 'Last Name'); !!}<br>
{!! Form::text('lastName')!!}<br>
{!! Form::label('firstName', 'First Name'); !!}<br>
{!! Form::text('firstName')!!}<br>
{!! Form::label('middleName', 'Middle Name'); !!}<br>
{!! Form::text('middleName')!!}<br>
{!! Form::label('numberPassport', 'Passport Number'); !!}<br>
{!! Form::text('numberPassport')!!}<br>
{!! Form::label('identificationNumber', 'Identification Number'); !!}<br>
{!! Form::text('identificationNumber')!!}<br>
{!! Form::label('phone', 'Phone Number'); !!}<br>
{!! Form::text('phone')!!}<br>
{!! Form::label('mail', 'Email'); !!}<br>
{!! Form::text('mail')!!}<br>
{!! Form::label('birthday', 'Birthday'); !!}<br>
{!! Form::date('birthday')!!}<br><br>
{!! Form::submit('Админ Нажми меня!')  !!}
{!! Form::close() !!}
