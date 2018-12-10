<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card_status extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function nameStatus()
    {
        return $this->belongsTo('App\Status_card', 'status_id');
    }

    public static function addCardStatus($user_id, $status_id, $comment = '')
    {
        $userStatus = new Card_status;
        $userStatus->user_id = $user_id;
        $userStatus->status_id = $status_id;
        $userStatus->comment = $comment;
        $userStatus->save();
    }

    public static function getCardStatus($id)
    {

    }
}
