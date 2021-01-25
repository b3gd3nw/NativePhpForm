<?php
require 'vendor/autoload.php';
require 'core/bootstrap.php';

//$router = new Router;
//
//
//require 'routes.php';
//

//
//require $router->direct(trim($_SERVER['REQUEST_URI'], '/'));
use App\Core\{Router, Request};


Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());
