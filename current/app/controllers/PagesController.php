<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\UsersModel;

class PagesController extends Controller
{
     /**
     * Show home page and grab user count.
     */
    public function index()
    {
        $this->model = new UsersModel();
        $counter = $this->model->getCountUser()[0];
        $config = require __DIR__ . '/../config/config.php';
        $this->view->generate('index.view.php', $counter , $config['share']);
    }
}