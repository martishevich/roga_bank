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

<?php if(isset($_POST['search'])){ ?>
    <table>
        <tr>
            <td>login</td>
            <td>firstName</td>
            <td>lastName</td>
            <td>middleName</td>
            <td>numberPassport</td>
            <td>identificationNumber</td>
            <td>phone_number</td>
            <td>mail</td>
            <td>actions</td>
        </tr>
        <?php foreach ($search as $row) {?>
        <tr>
            <td><?php echo $search[0]->login?></td>
            <td><?php echo $search[0]->lastName?></td>
            <td><?php echo $search[0]->firstName?></td>
            <td><?php echo $search[0]->middleName?></td>
            <td><?php echo $search[0]->numberPassport?></td>
            <td><?php echo $search[0]->identificationNumber?></td>
            <td><?php echo $search[0]->phone_number?></td>
            <td><?php echo $search[0]->mail?></td>
            <td>
                <a href="{{ route('user.show', $search[0]->id) }}">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="#">
                    <i class="fa fa-pencil-square-o"></i>
                </a>
                <a href="#">
                    <i class="fa fa-times"></i>
                </a>
            </td>
        </tr>
        <?php }?>
    </div>
</div>
</div>



<script src="https://use.fontawesome.com/b5c931b2df.js"></script>

