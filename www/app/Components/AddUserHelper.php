<?php
/**
 * Created by PhpStorm.
 * User: andrejkarshakevich
 * Date: 11/26/18
 * Time: 9:53 AM
 */

namespace App\Components;


class AddUserHelper
{
    public static function up($string)
    {
        $char = mb_strtoupper(substr($string,0,2), "utf-8"); // это первый символ
        $string[0] = $char[0];
        $string[1] = $char[1];
        return $string;
    }

    public static function filterPhone($phone)
    {
        $numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $phone = str_split($phone);
        $new_phone = '';
        foreach ($phone as $val){
            if (in_array($val, $numbers)){
                $new_phone .=$val;
            }
        }

        if(strlen($new_phone)==12){
            $new_phone = substr($new_phone, 3, 9);
        }
        if(strlen($new_phone)==13){
            $new_phone = substr($new_phone, 4, 9);
        }
        if(strlen($new_phone)==11){
            $new_phone = substr($new_phone, 2, 9);
        }

        return '375'.$new_phone;
    }

    public static function createCode()
    {
        $code ='';
        for ($i = 0; $i < 6; $i++) {
            $code .= rand(0, 9);
        }
        return $code;
    }

}