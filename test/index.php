<?php
var_dump(23);
require 'vendor/autoload.php';
require 'app/core/bootstrap.php';

//$router = new Router;
//
//
//require 'routes.php';
//

//
//require $router->direct(trim($_SERVER['REQUEST_URI'], '/'));
use app\core\{Router, Request};

Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());
