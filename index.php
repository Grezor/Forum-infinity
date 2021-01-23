<?php
// require 'vendor/autoload.php';
require 'App/Autoloader.php';
App\Autoloader::register();
session_start();
$url = $_SERVER['REQUEST_URI'] ?? $_GET['url'] ?? '';
$router = new App\Router\Router($url);

require __DIR__ . '/App/model/routes/home.php';
require __DIR__ . '/App/model/routes/account.php';
require __DIR__ . '/App/model/routes/forum.php';
require __DIR__ . '/App/model/routes/admin.php';

$router->run();