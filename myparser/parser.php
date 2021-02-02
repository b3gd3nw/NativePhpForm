<?php

require 'vendor/autoload.php';

use XPathSelector\Selector;
use GuzzleHttp\Client;

$client= new Client();
$dom = Selector::loadHTML($client->get('http://127.0.0.1:8888/')->getBody());
$test = $dom->findAll('//div[starts-with(@class, "newbook")]')->map(function ($node){
    return [
      'test' => $node->find('.//div[@class="book"]')->extract()
    ];
});
 var_dump($test);