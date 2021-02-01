<?php

require 'vendor/autoload.php';

use application\core\{Router, Request};

Router::load('application/routes.php')
    ->direct(Request::uri(), Request::method());