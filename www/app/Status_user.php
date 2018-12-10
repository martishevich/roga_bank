<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status_user extends Model
{
    public function userStatus()
    {
        return $this->hasMany('App\User_status', 'status_id');
    }
}
