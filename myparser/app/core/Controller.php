<?php

namespace app\core;

use app\interfaces\IParser;

class Controller implements IParser
{

    protected $config;

    public function __construct()
    {
        $this->config = require 'app/config/config.php.example';
    }

    public function getPage(string $url)
    {
        $content = file_get_contents($url);
        $dom = new \DOMDocument();
        @$dom->loadHTML($content);
        return new \DOMXPath($dom);
    }
}