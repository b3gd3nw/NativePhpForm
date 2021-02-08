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

    public function parse()
    {
        $xpath = $this->getPage($this->url);
        $nav = $xpath->query("//ul[contains(@class, 'dnrg')]/*");
        var_dump($nav);
        foreach ($nav as $item)
        {
            var_dump($item);
            foreach ($item->getElementByTagName('a') as $link)
            {
                var_dump($link);
//                $href = $link->getAttribute('href');
//                var_dump($href);
            }
        }
    }

}