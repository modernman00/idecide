<?php

include __DIR__ . "/../../vendor/autoload.php";

define('ROOT', __DIR__ ."/../../");


$dotenv = Dotenv\Dotenv::create(ROOT);
$dotenv->load();

