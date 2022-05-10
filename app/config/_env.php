<?php

include __DIR__ . "/../../vendor/autoload.php";

define('ROOT', realpath(__DIR__ ."/../../"));

$dotenv = \Dotenv\Dotenv::create(ROOT);
$dotenv->load();

