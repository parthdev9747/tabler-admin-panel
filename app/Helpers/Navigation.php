<?php


function isActiveRoute($route, $output = 'active')
{
    if (is_array($route)) {
        if (in_array(Route::currentRouteName(), $route)) {
            return $output;
        }
    } elseif (Route::currentRouteName() == $route) {
        return $output;
    }
    return null;
}

function isActiveDropdown($route, $output = 'show')
{
    if (is_array($route)) {
        if (in_array(Route::currentRouteName(), $route)) {
            return $output;
        }
    } elseif (Route::currentRouteName() == $route) {
        return $output;
    }
    return null;
}
