<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\MainController;

class Login extends Model
{
    public function phone()
    {
        return $this->hasMany('App\Phone_user','user_id');
    }

    public function mail()
    {
        return $this->hasMany('App\Mail_user','user_id');
    }



}
