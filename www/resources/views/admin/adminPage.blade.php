



{!! Form::macro('exit1', function () {
return '<input type="submit" value="exit" name="submit">';
});!!}
{!! Form::macro('exit2', function () {
return '<input type="submit" value="create" name="create">';
});!!}
<?php  echo $loginOk->login;?> вы успешно авторизировались


{!! Form::open(array('action' => 'AdminController@adminPage'))!!}
{!! Form::exit1()!!}
{!! Form::close()!!}

{!! Form::open(array('action' => 'AdminController@adminPage')) !!}
{!! Form::exit2('Создать пользователя')  !!}
{!! Form::close() !!}



