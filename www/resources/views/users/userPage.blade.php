@extends('layout')

@section('content')

{!! Form::macro('exit1', function () {
return '<input type="submit" value="exit" name="submit">';
});!!}

<div class="exit_userPage">
    <?php  echo $loginOk->login;?>
    {!!  Form::open(array('action' => 'UserController@userPage')) !!}
    {!! Form::exit1()  !!}
    {!!  Form::close() !!}
</div>


<div class="userPay">
    <form method="post" action="/userPage">

            <input type="radio" name="password" value="" checked class="formBox" id="no_pass">
            <label for="no_pass"> без онлайн платежей</label>

            <input type="radio" name="password" value="pass" class="formBox" id="pass">
            <label for="pass">с онлайн платежами</label>
            <input name="pass" value="" id="formBox_pass" disabled="disabled">
    </form>
</div>


<script>
    $(document).ready(function(){
        $('input:radio.formBox').click(function () {
            if($(this).val().length > 0){
                $('#formBox_pass').removeAttr('disabled');
            }
            else
            {
                $('#formBox_pass').attr('disabled','disabled');
                $('#formBox_pass').val('');
            }
        });
    });

</script>


@endsection
