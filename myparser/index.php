<?php

require 'vendor/autoload.php';

use app\core\{Router, Request};

Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());