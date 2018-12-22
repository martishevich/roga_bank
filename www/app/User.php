<?php

namespace App;

use App\Components\AddUserHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class User extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];


    public function phone()
    {
        return $this->hasMany('App\Phone_user', 'user_id');
    }

    public function mail()
    {
        return $this->hasMany('App\Mail_user', 'user_id');
    }

    public function account_card()
    {
        return $this->hasMany('App\Account_card', 'user_id');
    }

    public function userStatus()
    {
        return $this->hasMany('App\User_status', 'user_id');
    }

    public function cardStatus()
    {
        return $this->hasMany('App\Card_status', 'user_id');
    }

    public function salt()
    {
        return $this->hasMany('App\User_salt', 'user_id');
    }

    public function confirmationCode()
    {
        return $this->hasMany('App\ConfirmationCode', 'user_id');
    }

    public static function addUser($post)
    {
        $lastName = AddUserHelper::up($post['lastName']);
        $firstName = AddUserHelper::up($post['firstName']);
        $middleName = AddUserHelper::up($post['middleName']);

        $dataUser = new User;
        $dataUser->login = $post['login'];
        $dataUser->password = md5($post['password']);
        $dataUser->lastName = $lastName;
        $dataUser->firstName = $firstName;
        $dataUser->middleName = $middleName;
        $dataUser->numberPassport = $post['numberPassport'];
        $dataUser->identificationNumber = $post['identificationNumber'];
        $dataUser->birthday = $post['birthday'];
        $dataUser->save();
    }

    public static function updateUser($id, $post)
    {
        $lastName = AddUserHelper::up($post['lastName']);
        $firstName = AddUserHelper::up($post['firstName']);
        $middleName = AddUserHelper::up($post['middleName']);

        $dataUser = User::find($id);
        $dataUser->login = $post['login'];
        $dataUser->password = md5($post['password']);
        $dataUser->lastName = $lastName;
        $dataUser->firstName = $firstName;
        $dataUser->middleName = $middleName;
        $dataUser->numberPassport = $post['numberPassport'];
        $dataUser->identificationNumber = $post['identificationNumber'];
        $dataUser->birthday = $post['birthday'];
        $dataUser->save();
    }

    public static function updatePay($id, $pass)
    {
        $dataUser = User::find($id);
        $dataUser->password_pay = md5($pass);
        $dataUser->save();
    }

    public static function getPassPay($id)
    {
        $dataUser = User::find($id);
        return $dataUser->password_pay;
    }

    public static function search()
    {
        return $search = DB::table('users')
            ->leftJoin('phone_users', 'users.id', '=', 'phone_users.user_id')
            ->leftJoin('mail_users', 'users.id', '=', 'mail_users.user_id')
            ->select('users.id', 'users.login', 'users.firstName', 'users.lastName', 'users.middleName', 'users.numberPassport', 'users.identificationNumber', 'phone_users.phone_number', 'mail_users.mail')
            ->where('users.login', '=', $_POST['searchUser'])
            ->orWhere('users.firstName', '=', $_POST['searchUser'])
            ->orWhere('phone_users.phone_number', '=', $_POST['searchUser'])
            ->orWhere('mail_users.mail', '=', $_POST['searchUser'])
            ->groupBy('users.login')
            ->get();

    }




}
