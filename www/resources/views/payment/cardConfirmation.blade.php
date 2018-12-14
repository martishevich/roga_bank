<form method="post" action="/passwordConfirmation?id=<?php echo $_GET['id']?>">
    <div class="form-group">
        @csrf
        <label>Card Number</label><br>
        <input type="password" name="password_pay" class="form-control"><br>
        <input type="submit" value="add update" name="confirm" class="btn btn-primary">
    </div>
</form>

@include('errors')