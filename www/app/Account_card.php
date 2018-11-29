<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account_card extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Login');
    }
    public static function addAccountCard($card_number, $cvv , $first_name, $last_name, $expiration_date, $currency, $user_id)
    {
        $card = new Account_card();
        $card->card_number = $card_number;
        $card->CVV = $cvv;
        $card->first_name = $first_name;
        $card->last_name = $last_name;
        $card->expiration_date = $expiration_date;
        $card->currency = $currency;
        $card->user_id = $user_id;
        $card->save();
    }
}
