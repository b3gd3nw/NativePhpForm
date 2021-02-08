<?php

// Parsing site

namespace app\controllers;

use app\core\Controller;

class ParserController extends Controller
{

    private $url;
    protected $config;
    private $count = 0;

    public function __construct()
    {
        parent::__construct();
        $this->url = $this->config['url'];

        if(empty($this->url)){
            throw new \Exception("Адрес сайта пустой.");
        }
    }

}