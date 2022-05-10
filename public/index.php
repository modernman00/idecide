<?php

use App\routing\RouteDispatch as dispatcher;

include __DIR__ . "/../app/config/init.php";

// initiate the router

// new App\routing\RouteDispatch($router);

$getDispatcher = new dispatcher;
$getDispatcher->dispatch($router);



?>