<?php


ob_start();
define('R3F3CC', true);


require './vendor/autoload.php';
$url = new Core\ConfigController();
$url->carregar();




