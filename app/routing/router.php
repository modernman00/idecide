<?php

//namespace App\routing;

$router = new AltoRouter;

$router->map("GET",  "/",  "",  "home_us");

// map homepage using callable



//$router->map('POST', '/about', 'App\controller\index@homePage', 'About us');

 $match = $router->match();

var_dump($match);
