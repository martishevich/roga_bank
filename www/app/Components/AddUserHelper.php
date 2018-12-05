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

}