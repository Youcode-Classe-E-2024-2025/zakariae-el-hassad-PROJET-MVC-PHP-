<?php

header('Content-Type: text/html; charset=UTF-8');
header('Cache-Control: no-cache, must-revalidate');
header('Expires: 0');

require '../vendor/autoload.php';
require_once '../app/core/Router.php';

$config = require '../app/config/config.php';

session_start();

$router = new Router($config['app']['base_url']);
$router->addRoutes(require '../app/config/router.php');


$router->run();


