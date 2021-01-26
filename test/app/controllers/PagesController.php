<?php

namespace app\controllers;

use  app\core\Controller;
use app\models\ProjectModel;


class PagesController extends Controller
{
    public function index()
    {
       $this->model = new ProjectModel();
        return view('index');
    }

    public function addUser()
    {
        var_dump(1);
        $this->model = new ProjectModel();
        if (! empty(filter_input_array(INPUT_POST))) {
            var_dump(filter_input_array(INPUT_POST));
            $p = $this->model->addUser(filter_input_array(INPUT_POST));
            var_dump($p);
        }
    }
}