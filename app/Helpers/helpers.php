<?php

use Illuminate\Support\Facades\Request;

if (!function_exists('activeMenu')) {
    function activeMenu($routeNames)
    {
        if (is_array($routeNames)) {
            foreach ($routeNames as $routeName) {
                if (Request::routeIs($routeName)) {
                    return 'active';
                }
            }
        } else {
            if (Request::routeIs($routeNames)) {
                return 'active';
            }
        }

        return '';
    }

    if (!function_exists('customDate')) {
        function customDate($date, $format = 'd M, Y')
        {
            return date($format, strtotime($date));
        }
    }

    function getAmount($amount, $length = 0)
    {
        if ($amount == 0) {
            return 0;
        }
        if ($length == 0) {
            preg_match("#^([\+\-]|)([0-9]*)(\.([0-9]*?)|)(0*)$#", trim($amount), $o);
            return $o[1] . sprintf('%d', $o[2]) . ($o[3] != '.' ? $o[3] : '');
        }

        return round($amount, $length);
    }
}



