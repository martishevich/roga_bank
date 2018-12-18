<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <base href="/">
    <title>Template for Bank system</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/cover.css" rel="stylesheet">
</head>


<body class="text-center" style="display: flex; align-items: center; height: 100%;">


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>

<header class="row">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="col-md-8">
            <nav class="nav nav-pills nav-justified">
                <a class="nav-link " href="/userPage">Home</a>
                <a class="nav-link active" href="#">profile reducting</a>
                <a class="nav-link" href="/transfer">transfer</a>
                <a class="nav-link" href="#">transactions</a>
            </nav>
        </div>
        <div class="col-md-4">
            <form method="post" action="/userPage" class="form_header">
                @csrf
                {{$sum['0']->sum}}
                <input type="submit" value="exit" name="submit" class="btn btn-light">
            </form>
        </div>
    </nav>
</header>

<div class="jumbotron ">
    <div class="container">
        <div class="col">
            <form method="post" action="/userUpdateData">
                <div class="form-group">
                    @csrf
                    <label>Изменить номер телефона</label>
                    <input type="text" name="phone" class="form-control"
                           value=<?php echo $user->phone->first()->phone_number?>>
                    <label>Изменить mail</label>
                    <input type="text" name="mail" class="form-control" value=<?php echo $user->mail->first()->mail?>>
                    <input type="radio" name="password" value="" checked class="formBox" id="no_pass">
                    <label for="no_pass"> без онлайн платежей</label>
                    <input type="radio" name="password" value="pass" class="formBox" id="pass">
                    <label for="pass">с онлайн платежами</label>
                    <input type="password" name="pass" value="" id="formBox_pass" disabled="disabled"
                           class="form-control">
                    <input type="submit" value="add update" name="add" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>





<script>
    $(document).ready(function () {
        $('input:radio.formBox').click(function () {
            if ($(this).val().length > 0) {
                $('#formBox_pass').removeAttr('disabled');
            }
            else {
                $('#formBox_pass').attr('disabled', 'disabled');
                $('#formBox_pass').val('');
            }
        });
    });

</script>


<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';

        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

</body>
</html>

