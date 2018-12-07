<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status_card extends Model
{
    public function card()
    {
        return $this->hasMany('App\Card_status','status_id');
    }
}
