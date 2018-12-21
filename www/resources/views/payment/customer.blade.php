<form class="card p-2"method="get" action="/paymentPage">
    <div class="form-group">
        @csrf
        <label>Card Number</label><br>
        <input type="text" name="card_number" class="form-control"><br>
        <label>total</label><br>
        <input type="text" name="total" class="form-control"><br>
        <label>comment</label><br>
        <input type="text" name="comment" class="form-control"><br>
        <label>salt</label><br>
        <input type="text" name="salt" class="form-control"><br>

        <input type="submit" value="add update" name="pay" class="btn btn-primary">
    </div>
</form>