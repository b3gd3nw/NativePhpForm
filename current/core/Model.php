<?php

namespace App\Core;

abstract class Model {

    protected $connect;

    public function __construct()
    {
        $this->connect = QueryBuilder::connect();
    }
}