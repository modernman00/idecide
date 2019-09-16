<?php

namespace App\routing;

use AltoRouter;

//require "router.php";

class RouteDispatch
{
    protected $match;
    protected $controller;
    protected $method;

    function __construct(AltoRouter $router)
    {
        $this->match = $router->match();

        if ($this->match) {

            $controllerAndFunction = explode('@', $this->match['target']);

            $this->controller = $controllerAndFunction[0];
            $this->method = $controllerAndFunction[1];

            if (is_callable($this->controller, $this->method)) {

                call_user_func_array(array(new $this->controller, $this->method), array($this->match['params']));
            } else {
                echo "This method {$this->method} is not defined in this {$this->controller}";
            }
        } else {
            
            return view('public/error');
        }
    }
}
