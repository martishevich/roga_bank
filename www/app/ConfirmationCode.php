<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfirmationCode extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function addCode($code, $user_id)
    {
        $confCode = new ConfirmationCode;
        $confCode->confirmation_code = $code;
        $confCode->user_id = $user_id;
        $confCode->save();
    }

    public static function updateDataPhone($code, $user_id)
    {
        $confCode = ConfirmationCode::where('user_id', '=', $user_id)->first();
        $confCode->confirmation_code = $code;
        $confCode->save();
    }

    public static function addData($post, $user_id)
    {
        $data = ['card_number' => $post['card_number'], 'first_name' => $post['first_name'], 'last_name' => $post['last_name'], 'sum' => $post['sum']];
        $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        $confCode = ConfirmationCode::where('user_id', '=', $user_id)->first();
        $confCode->data = $data;
        $confCode->save();
    }

}
