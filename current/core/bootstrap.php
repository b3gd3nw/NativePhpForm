<?php

use App\Core\App;

App::bind('config', require './../app/config/config.php');

function view($name, $data = [])
{
    extract($data);
    return require "../app/views/{$name}.view.php";
}

function redirect($path)
{
    header("Location: /{$path}");
}