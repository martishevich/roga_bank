<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Components\AddUserHelper;
class Phone_user extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function addPhone($phone_number, $main_phone, $user_id)
    {
        $phone = new Phone_user;
        $phone->phone_number = AddUserHelper::filterPhone($phone_number);
        $phone->main_phone = $main_phone;
        $phone->user_id = $user_id;
        $phone->save();
    }
    public static function updateDataPhone($phone_number,$user_id)
    {
        $phone = Phone_user::where('user_id', '=', $user_id)->first();
        $phone->phone_number = AddUserHelper::filterPhone($phone_number);
        $phone->save();
    }


}
