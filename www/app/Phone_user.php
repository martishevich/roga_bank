<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone_user extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Login');
    }

    public static function addPhone($phone_number, $main_phone  , $user_id)
    {
        $phone = new Phone_user;
        $phone->phone_number = $phone_number;
        $phone->main_phone = $main_phone;
        $phone->user_id = $user_id;
        $phone->save();
    }
    public static function updateDataPhone($id_phone, $phone_number, $main_phone, $user_id)
    {
        $phone = Phone_user::find($id_phone);
        $phone->phone_number = $phone_number;
        $phone->main_phone = $main_phone;
        $phone->user_id = $user_id;
        $phone->save();
    }
}
