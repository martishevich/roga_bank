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


<body class="text-center" style="display: flex; align-items: center; height: 50%;">


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>

<header class="row">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="col-md-8">
            <nav class="nav nav-pills nav-justified">
                <a class="nav-link " href="userPage">Home</a>
                <a class="nav-link " href="/userUpdateData">profile reducting</a>
                <a class="nav-link" href="/transfer">transfer</a>
                <a class="nav-link active" href="/transaction">transactions</a>
                <a class="nav-link" href="/api">API</a>
            </nav>
        </div>
        <div class="col-md-4 ">

            <form method="post" action="/transaction" class="form_header">
                @csrf
                {{$sum}}
                <input type="submit" value="exit" name="submit" class="btn btn-light">
            </form>
        </div>
    </nav>
</header>

<div class="jumbotron">
    <div class="container">
        <div class="col main-view-transaction">
            <form method="post" action="/transaction" class="form_header">
                @csrf
                <input type="submit" value="get a statement" name="statement" class="btn btn-primary">
            </form>
            <table class="table ">
                <tr>
                    <th scope="col">Sender account</th>
                    <th scope="col">Beneficiary account</th>
                    <th scope="col">Sum</th>
                    <th scope="col">Currency</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Date create</th>
                </tr>
                <?php foreach ($allTransaction as$key => $row) {?>
                <tr>
                    <td><?php echo $allTransaction[$key]->sender_account?></td>
                    <td><?php echo $allTransaction[$key]->beneficiary_account?></td>
                    <td><?php echo $allTransaction[$key]->sum?></td>
                    <td><?php echo $allTransaction[$key]->currency?></td>
                    <td><?php echo $allTransaction[$key]->comment?></td>
                    <td><?php echo $allTransaction[$key]->created_at?></td>
                </tr>
                <?php }?>
            </table>
            {{ $allTransaction->links() }}
        </div>

    </div>
</div>



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



