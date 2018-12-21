<form class="card p-2"method="post" action="/cardConfirmation?card_number=<?=$_GET['card_number']?>&total=<?=$_GET['total']?>&comment=<?=$_GET['comment']?>&salt=<?=$_GET['salt']?>">
    <div class="form-group">
        @csrf
        <label>Card Number</label><br>
        <input type="text" name="card_number" class="form-control"><br>
        <label>CVV</label><br>
        <input type="text" name="CVV" class="form-control"><br>
        <label>First name</label><br>
        <input type="text" name="first_name" class="form-control"><br>
        <label>Last name</label><br>
        <input type="text" name="last_name" class="form-control"><br>
        <label>Expirtion data</label><br>
        <input type="text" name="date" class="form-control"><br>
        <input type="submit" value="add update" name="pay" class="btn btn-primary">
    </div>
</form>

@include('errors')