
    @include('errors')

        {{--<p>Edit user - <strong>{{$user->login}}</strong></p>--}}

                {!! Form::open(['route' => ['user.update', $user->id], 'method'=>'PUT']) !!}

                    {!! Form::label('login', 'User'); !!}<br>
                    {!! Form::text('login', $user->login)!!}<br>
                    {!! Form::label('password', 'Password'); !!}<br>
                    {!! Form::text('password', $user->password)!!}<br>
                    {!! Form::label('lastName', 'Last Name'); !!}<br>
                    {!! Form::text('lastName', $user->lastName)!!}<br>
                    {!! Form::label('firstName', 'First Name'); !!}<br>
                    {!! Form::text('firstName', $user->firstName)!!}<br>
                    {!! Form::label('middleName', 'Middle Name'); !!}<br>
                    {!! Form::text('middleName', $user->middleName)!!}<br>
                    {!! Form::label('numberPassport', 'Passport Number'); !!}<br>
                    {!! Form::text('numberPassport', $user->numberPassport)!!}<br>
                    {!! Form::label('identificationNumber', 'Identification Number'); !!}<br>
                    {!! Form::text('identificationNumber', $user->identificationNumber)!!}<br>
                    {!! Form::label('phone', 'Phone Number'); !!}<br>
                    {!! Form::text('phone', $user->phone_number)!!}<br>
                    {!! Form::label('mail', 'Email'); !!}<br>
                    {!! Form::text('mail')!!}<br>
                    {!! Form::label('birthday', 'Birthday'); !!}<br>
                    {!! Form::date('birthday', $user->birthday)!!}<br>
                    {{--{!! Form::label('cardСurrency', 'Сard Currency'); !!}<br>--}}
                    {{--{!! Form::select('currency', array('USD' => 'USD', 'EUR' => 'EUR', 'GBP' => 'GBP', 'BYN' => 'BYN'), 'BYN')!!}<br><br>--}}
                    {!! Form::submit('Update')  !!}

                {!! Form::close() !!}


