<?php

function isActiveRoute($route, $output = " active")
{
    if (Route::currentRouteName() == $route) {
        return $output;
    }

    return null;
}

function areActiveRoutes(Array $routes, $output = " active")
{
    foreach ($routes as $route) {
        if (Route::currentRouteName() == $route) {
            return $output;
        }
    }

    return null;

}