<?php
/**
 * Created by PhpStorm.
 * User: andrejkarshakevich
 * Date: 11/28/18
 * Time: 2:48 PM
 */

namespace App\Components;

use App\User;
use App\Account_card;


class HelpAccountCard
{
    public static function generationAccountCard()
    {
        $sum = 0;
        $card_namber = 4;
        $cvv = '';
        for ($i = 0; $i < 13; $i++) {
            $card_namber .= rand(0, 9);
        }
        $card_namber .= rand(1, 9);

        for ($i = 0, $j = strlen($card_namber); $i < $j; $i++) {
            // использовать четные цифры как есть
            if (($i % 2) == 0) {
                $val = $card_namber[$i] * 2;
                if ($val > 9) $val -= 9;
            } else {
                // удвоить нечетные цифры и вычесть 9, если они больше 9

                $val = $card_namber[$i];
            }

            $sum += $val;


        }
        if ($sum % 10 == 0) {
            $card_namber .= 0;
        } else if (($sum + 1) % 10 == 0) {
            $card_namber .= 1;
        } else if (($sum + 2) % 10 == 0) {
            $card_namber .= 2;
        } else if (($sum + 3) % 10 == 0) {
            $card_namber .= 3;
        } else if (($sum + 4) % 10 == 0) {
            $card_namber .= 4;
        } else if (($sum + 5) % 10 == 0) {
            $card_namber .= 5;
        } else if (($sum + 6) % 10 == 0) {
            $card_namber .= 6;
        } else if (($sum + 7) % 10 == 0) {
            $card_namber .= 7;
        } else if (($sum + 8) % 10 == 0) {
            $card_namber .= 8;
        } else if (($sum + 9) % 10 == 0) {
            $card_namber .= 9;
        }


        //genirate CVV
        for ($i = 0; $i < 3; $i++) {
            $cvv .= rand(0, 9);
        }

        $valid_thru = date("Y-m-d", strtotime('+27 month'));

        return [
            'card_number' => $card_namber,
            'cvv'         => $cvv,
            'valid_thru'  => $valid_thru,
        ];

    }

    public static function trimDate($date)
    {
        $date = substr($date,0,7);
        $start = substr($date,-2);
        $end = substr($date,2,2);
        $result = $start .'/'.$end;
        return $result;
    }

}