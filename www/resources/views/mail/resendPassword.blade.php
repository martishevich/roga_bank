<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Востановление пароля</title>
</head>
<body>
<h1>Уважаемый {{$objDemo->first_name}}, высылаем Вам новый пароль для входа в личный кабинет</h1>
<p>Ссылка для входа в личный кабинет: http://rogabank.tk/login</p>
<p>Ваш логин для входа: <b>{{ $objDemo->login  }}</b></p>
<p>Ваш <b>новый</b> пароль для входа: <b>{{ $objDemo->password }}</b></p>
</body>
</html>
