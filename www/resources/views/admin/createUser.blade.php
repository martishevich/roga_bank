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
{!! Form::label('numberPassport', 'Number Passport'); !!}<br>
{!! Form::text('numberPassport')!!}<br>
{!! Form::label('identificationNumber', 'Identification Number'); !!}<br>
{!! Form::text('identificationNumber')!!}<br>
{!! Form::label('phone', 'phone'); !!}<br>
{!! Form::text('phone')!!}<br>
{!! Form::label('mail', 'mail'); !!}<br>
{!! Form::text('mail')!!}<br>
{!! Form::label('birthday', 'birthday'); !!}<br>
{!! Form::date('birthday')!!}<br>
{!! Form::submit('Админ Нажми меня!')  !!}
{!! Form::close() !!}