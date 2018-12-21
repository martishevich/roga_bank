<form method="post" action="/passwordConfirmation?card_number={{$_GET['card_number']}}&total={{$_GET['total']}}&comment={{$_GET['comment']}}&salt={{$_GET['salt']}}">
    <div class="form-group">
        @csrf
        <label>Card Number</label><br>
        <input type="password" name="password_pay" class="form-control"><br>
        <input type="submit" value="add update" name="confirm" class="btn btn-primary">
    </div>
</form>
{{$message}}
@include('errors')