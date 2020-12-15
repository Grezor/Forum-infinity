<?php
// require 'vendor/autoload.php';
require 'controller/Autoloader.php';
App\Autoloader::register();

$url = $_SERVER['REQUEST_URI'] ?? $_GET['url'] ?? '';
$router = new App\Router\Router($url);

require __DIR__ . '/controller/model/routes/home.php';
require __DIR__ . '/controller/model/routes/account.php';
require __DIR__ . '/controller/model/routes/forum.php';
require __DIR__ . '/controller/model/routes/admin.php';

$router->run();