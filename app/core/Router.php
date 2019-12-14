<?php

namespace app\core;

use app\core\BaseClass;

class Router extends BaseClass
{

    const ROUTES = [
        '/' => '/page/index',
    ];

    public function __construct()
    {
        $this->go($this->url);
    }

    public function get__url()
    {
        $url = $_SERVER['REQUEST_URI'];

        if( array_key_exists($url, static::ROUTES) )
            $url = static::ROUTES[$url];

        return $url;
    }

    public function go($url)
    {
        list( /* before first slash */, $controllerName, $methodName ) = explode('/', explode('?', $url)[0]);

        $controllerName = ucfirst($controllerName);
        $controllerClass = "\\app\\controllers\\$controllerName";

        if( !$controllerName || !$methodName || !class_exists($controllerClass) || !in_array($methodName, get_class_methods($controllerClass)) ){
            $controllerClass = '\\app\\controllers\\Page';
            $methodName = 'error404';
        }

        $controller = new $controllerClass();
        $controller->{$methodName}();
    }

}
