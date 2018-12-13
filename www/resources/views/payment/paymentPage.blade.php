

{!! Form::open(array('action' => 'PaymentController@paymentPage')) !!}
{!! Form::label('cardNumber', 'Card Number'); !!}<br>
{!! Form::text('cardNumber')!!}<br>
{!! Form::label('CVV', 'CVV'); !!}<br>
{!! Form::password('CVV')!!}<br>
{!! Form::label('first_name', 'First name'); !!}<br>
{!! Form::password('first_name')!!}<br>
{!! Form::label('last_name', 'Last name'); !!}<br>
{!! Form::password('last_name')!!}<br>
{!! Form::submit('Нажми меня!')  !!}
{!! Form::close() !!}