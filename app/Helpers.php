<?php

if (!function_exists('simple_password')) {
    function simple_password(int $length)
    {
        $letters = "abcdefghijklmnopqrstuvwxyz0123456789";
        $result = "";

        for ($i = 0; $i < $length; $i++) {
            $result .= $letters[rand(0, strlen($letters) - 1)];
        }

        return $result;
    }
}


if (!function_exists('zerofill')) {
    function zerofill(int $number, int $length)
    {
        return sprintf("%0{$length}d", $number);
    }
}
