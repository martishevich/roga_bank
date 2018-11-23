



{!! Form::macro('exit1', function () {
return '<input type="submit" value="exit" name="submit">';
});!!}
<?php  echo $loginOk->login;?> вы успешно авторизировались


{!! Form::open(array('action' => 'AdminController@adminPage'))!!}
{!! Form::exit1()!!}
{!! Form::close()!!}


