<?php


use App\controller\Index as index;

$router = new AltoRouter;

$router->map('GET', '/about', 'App\controller\About@show', 'about us' );

$router->map('GET', '/', 'App\controller\Index@home', 'home');

$router->map('GET', '/home2', 'App\controller\Index@home2', 'home2');

$router->map('GET', '/decidepics', 'App\controller\Index@decidepics', 'decide');

$router->map('GET', '/decide2', 'App\controller\Index@decide2', 'decide2');

$router->map('GET', '/main', 'App\controller\Index@main', 'homepage');

$router->map('POST', '/main', 'App\controller\Index@submit', 'process');

$router->map('GET', '/decision', 'App\controller\Index@decision', 'decision');


