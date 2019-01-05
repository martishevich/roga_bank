@extends('layoutSecond')
@section('content')
<div class="main-refill-block">
    <form method="post" action="/adminPage/{{$user->id}}/refill" >
        @csrf
        <label>Сумма к оплате</label>
        <input type="text" name="refill" class="form-control" >
        <input type="submit" value="отправить на счет" name="submit" class="btn btn-primary">
    </form>
    @include('errors')
</div>

@endsection