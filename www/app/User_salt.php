<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Components\GenirateSalt;

class User_salt extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function addSalt($user_id)
    {
        $salt = new User_salt();
        $salt->salt = GenirateSalt::salt();
        $salt->user_id = $user_id;
        $salt->save();
    }
}
