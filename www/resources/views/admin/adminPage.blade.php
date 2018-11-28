{!! Form::macro('exit1', function () {
return '<input type="submit" value="exit" name="submit">';
});!!}
{!! Form::macro('exit2', function () {
return '<input type="submit" value="create" name="create">';
});!!}
<?php  echo $loginOk->login;?> вы успешно авторизировались
{!! Form::macro('exit3', function () {
return '<input type="submit" value="search" name="search">';
});!!}


{!! Form::open(array('action' => 'AdminController@adminPage'))!!}
{!! Form::exit1()!!}
{!! Form::close()!!}

{!! Form::open(array('action' => 'AdminController@adminPage')) !!}
{!! Form::exit2('create users')  !!}
{!! Form::close() !!}

{!! Form::open(array('action' => 'AdminController@adminPage')) !!}
{!!  Form::text('searchUser')!!}
{!! Form::exit3('search')  !!}
{!! Form::close() !!}


<?php if(isset($_POST['search'])){ ?>
    <table>
        <tr>
            <td>login</td>
            <td>firstName</td>
            <td>lastName</td>
            <td>numberPassport</td>
            <td>identificationNumber</td>
            <td>phone_number</td>
            <td>mail</td>
        </tr>
        <?php foreach ($search as $row) {?>
        <tr>
            <td><?php echo $search[0]->login?></td>
            <td><?php echo $search[0]->firstName?></td>
            <td><?php echo $search[0]->lastName?></td>
            <td><?php echo $search[0]->numberPassport?></td>
            <td><?php echo $search[0]->identificationNumber?></td>
            <td><?php echo $search[0]->phone_number?></td>
            <td><?php echo $search[0]->mail?></td>
        </tr>
        <?php }?>
    </table>
<?php }?>

