<?php

namespace app\core;


abstract class Model
{
    protected $connect;

    public function __construct()
    {
        $this->connect = DBController::connect();
    }
}