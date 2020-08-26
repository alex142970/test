<?php

namespace App;

class Router
{

    public static function init()
    {
        $url = $_SERVER["REQUEST_URI"];

        $routes = require_once(__DIR__ ."/routes.php");

        foreach ($routes as $key => $action) {
            if($url == $key) {
                $controller = explode("@", $action)[0];
                $method = explode("@", $action)[1];
                (new $controller())->$method();
            }
        }
    }
}