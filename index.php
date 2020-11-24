<?php
require 'vendor/autoload.php';

$url = $_SERVER['REQUEST_URI'] ?? $_GET['url'] ?? '';

$router = new App\Router\Router($url);

require __DIR__ . '/model/routes/home.php';
require __DIR__ . '/model/routes/account.php';
require __DIR__ . '/model/routes/forum.php';
require __DIR__ . '/model/routes/admin.php';

$router->run();