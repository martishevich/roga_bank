<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail_user extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function addMail($mail, $main_mail, $user_id)
    {
        $mailUser = new Mail_user;
        $mailUser->mail = strtolower($mail);
        $mailUser->main_mail = $main_mail;
        $mailUser->user_id = $user_id;
        $mailUser->save();
    }
    public static function updateDataMail($mail,  $user_id)
    {
        $mailUser =Mail_user::where('user_id', '=', $user_id)->first();
        $mailUser->mail = strtolower($mail);

        $mailUser->save();
    }

}
