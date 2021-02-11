<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\UsersModel;

class PagesController extends Controller
{
     /**
     * Show home page.
     */
    public function index()
    {
        $this->model = new UsersModel();
        $config = require __DIR__ . '/../config/config.php.example';
        $this->view->generate('index.view.php', array_merge($this->model->getCountUser()[0], $config['share']));
        setcookie('allUsers', $this->model->getCountUser()[0]['total'], '/');
    }
}