<?php

namespace App\Helpers;

class Helper
{
    public static function generateHexColorArray($length): array
    {
        $colors = array();

        for ($i = 0; $i < $length; $i++) {
            $color = '#'.substr(str_shuffle('ABCDEF0123456789'), 0, 6);
            $colors[] = $color;
        }

        return $colors;
    }

}
