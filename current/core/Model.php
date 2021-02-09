<?php

namespace App\Core;


use App\Core\database\QueryBuilder;

abstract class Model {

    protected $connect;

    public function __construct()
    {
        $this->connect = QueryBuilder::connect();
    }
}