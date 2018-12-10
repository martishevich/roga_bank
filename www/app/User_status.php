<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_status extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function userStatus()
    {
        return $this->belongsTo('App\Status_user', 'status_id');
    }

    public static function addUserStatus($user_id, $status_id, $comment = '')
    {
        $userStatus = new User_status;
        $userStatus->user_id = $user_id;
        $userStatus->status_id = $status_id;
        $userStatus->comment = $comment;
        $userStatus->save();
    }

    public static function getUserStatus($id)
    {

    }
}
