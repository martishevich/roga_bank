<?php
/**
 * Created by PhpStorm.
 * User: andrejkarshakevich
 * Date: 12/6/18
 * Time: 12:07 PM
 */

namespace App\Components;


class GenirateSalt
{
    public static function salt()
    {
        $rand = '';
        $count = 0;
        while ($count < 128) {
            $rand .= rand(0,9);
            $count++;
        }
        return $rand;
    }

}