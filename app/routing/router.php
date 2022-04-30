<?php

$router = new AltoRouter;

$router->map('GET', '/about', 'App\controller\About@show', 'about us' );

$router->map('GET', '/', 'App\controller\Index@homePage', 'home');



