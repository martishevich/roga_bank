<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Активация регистрации нового пользователя</title>
</head>
<body>
<h1>Спасибо за регистрацию, {{$objDemo->first_name}}!</h1>
<p>
    Ваш пароль для входа: {{ $objDemo->password }}
</p>
</body>
</html>
