<?php

if (!function_exists('getDirection')) {
    function getDirection()
    {
        $rtlLanguages = ['ar', 'he', 'ur', 'fa'];

        return in_array(app()->getLocale(), $rtlLanguages) ? 'ltr' : 'ltr';
    }
}
