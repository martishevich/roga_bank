<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Components\HelpAccountCard;
class Account_card extends Model
{

    public function user()
    {
        return $this->belongsTo('App\Login');
    }
    public static function addAccountCard( $first_name, $last_name, $currency, $user_id)
    {
        $generate_card = HelpAccountCard::generationAccountCard();
        $generate_card1 = HelpAccountCard::generationAccountCard();
        $card = new Account_card();
        $card->card_number = $generate_card['card_number'];
        $card->CVV = $generate_card1['cvv'];
        $card->first_name = $first_name;
        $card->last_name = $last_name;
        $card->expiration_date =  $generate_card['valid_thru'];
        $card->currency = $currency;
        $card->user_id = $user_id;
        $card->save();
    }
}
