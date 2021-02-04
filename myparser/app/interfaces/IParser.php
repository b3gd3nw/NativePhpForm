<?php

namespace app\interfaces;

interface IParser {
    public function getPage(string $url);
}