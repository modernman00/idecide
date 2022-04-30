<?php

use Philo\Blade\Blade;

function testName($name)
{
    echo $name;
}

function view ($path, array $data = []) 
{
    $view = __DIR__ . "/../../resources/view";
    $cache = __DIR__ . "/../../bootstrap/cache";
    $blade = new Blade(viewPaths:$view, cachePath:$cache);
    echo $blade->view()->make($path, $data)->render();
}