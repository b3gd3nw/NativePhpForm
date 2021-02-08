<?php

namespace app\core;

use app\interfaces\IParser;

class Controller implements IParser
{

    protected $config;

    public function __construct()
    {
        $this->config = require "../config/config.php";


    }

    public function getPage(string $url) {

    }
}