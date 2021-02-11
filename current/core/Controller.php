<?php

namespace App\Core;

/**
 * Do not work.
 * Class Controller
 * @package App\Core
 *
 */
abstract class Controller
{
    public $model;
    public $view;

    public function __construct()
    {
        $this->view = new View();
    }

    abstract public function index();
}