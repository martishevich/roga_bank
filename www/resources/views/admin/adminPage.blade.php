@extends('layout')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <?php  echo $loginOk->login;?> you logged in successfully

            {!! Form::macro('exit1', function () {
            return '<input type="submit" value="exit" name="submit" class="btn btn-danger">';
            });!!}
            {!! Form::macro('exit2', function () {
            return '<input type="submit" value="create user" name="create" class="btn btn-warning">';
            });!!}
            {!! Form::macro('exit3', function () {
            return '<input type="submit" value="search" name="search" class="btn btn-primary">';
            });!!}

            <div class="action text-center" style="display: flex; justify-content: center;">
                {!! Form::open(array('action' => 'AdminController@adminPage'))!!}
                {!! Form::exit1()!!}
                {!! Form::close()!!}

                {!! Form::open(array('action' => 'AdminController@adminPage')) !!}
                {!! Form::exit2('create users')  !!}
                {!! Form::close() !!}
            </div>


            {!! Form::open(array('action' => 'AdminController@adminPage')) !!}
            {!!  Form::text('searchUser')!!}
            {!! Form::exit3('search')  !!}
            {!! Form::close() !!}
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <?php if(isset($_POST['search'])){ ?>
            <table class="table">
                <tr>
                    <th scope="col">login</th>
                    <th scope="col">firstName</th>
                    <th scope="col">lastName</th>
                    <th scope="col">middleName</th>
                    <th scope="col">numberPassport</th>
                    <th scope="col">identificationNumber</th>
                    <th scope="col">phone_number</th>
                    <th scope="col">mail</th>
                    <th scope="col">actions</th>
                </tr>
                <?php foreach ($search as $row) {?>
                <tr>
                    <td><?php echo $search[0]->login?></td>
                    <td><?php echo $search[0]->firstName?></td>
                    <td><?php echo $search[0]->lastName?></td>
                    <td><?php echo $search[0]->middleName?></td>
                    <td><?php echo $search[0]->numberPassport?></td>
                    <td><?php echo $search[0]->identificationNumber?></td>
                    <td><?php echo $search[0]->phone_number?></td>
                    <td><?php echo $search[0]->mail?></td>
                    <td>
                        <a href="{{ route('user.show', $search[0]->id) }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('user.edit', $search[0]->id) }}">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                        {!! Form::open(['method' => 'DELETE',
                                       'route' => ['user.delete', $search[0]->id]]) !!}
                        <button onclick="return confirm('Are you sure?')">
                            <i class="fa fa-times"></i>
                        </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
                <?php }?>
            </table>
            <?php }?>
        </div>
    </div>
</div>


<script src="https://use.fontawesome.com/b5c931b2df.js"></script>

