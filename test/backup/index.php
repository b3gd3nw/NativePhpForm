<?php

require 'core/bootstrap.php';

//$router = new Router;
//
//
//require 'routes.php';
//

//
//require $router->direct(trim($_SERVER['REQUEST_URI'], '/'));

require Router::load('routes.php')
    ->direct(Request::uri());
