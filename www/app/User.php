<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\MainController;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];


    public function phone()
    {
        return $this->hasMany('App\Phone_user','user_id');
    }

    public function mail()
    {
        return $this->hasMany('App\Mail_user','user_id');
    }
    public function account_card()
    {
        return $this->hasMany('App\Account_card','user_id');
    }
    public function userStatus()
    {
        return $this->hasMany('App\User_status','user_id');
    }
    public function cardStatus()
    {
        return $this->hasMany('App\Card_status','user_id');
    }
    public static function addUser($login, $password, $lastName, $firstName, $middleName, $numberPassport, $identificationNumber, $birthday)
    {
        $dataUser = new User;
        $dataUser->login = $login;
        $dataUser->password = $password;
        $dataUser->lastName = $lastName;
        $dataUser->firstName = $firstName;
        $dataUser->middleName = $middleName;
        $dataUser->numberPassport =$numberPassport;
        $dataUser->identificationNumber =$identificationNumber;
        $dataUser->birthday = $birthday;
        $dataUser->save();
    }

}
