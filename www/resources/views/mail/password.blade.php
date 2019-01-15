<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Активация регистрации нового пользователя</title>
</head>
<body>
<h1>Спасибо за регистрацию, {{$objDemo->first_name}}!</h1>
<p>Ссылка для входа в личный кабинет: http://rogabank.tk/login</p>
<p>Ваш логин для входа: <b>{{ $objDemo->login  }}</b></p>
<p>Ваш пароль для входа: <b>{{ $objDemo->password }}</b></p>
</body>
</html>
