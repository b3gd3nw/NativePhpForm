<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\UsersModel;

class UsersController extends Controller
{
    /**
     * Show all members page.
     */
    public function index()
    {
        $this->model = new UsersModel();
        $this->view->generate('all_members.view.php', $this->model->viewAll());
    }

    /**
     * Save user information from step one to the database.
     */
    public function insert()
    {
        if (! empty(filter_input_array(INPUT_POST))) {
            $this->model = new UsersModel();
            if ($userid = $this->model->insert(filter_input_array(INPUT_POST))) {
                setcookie("userID", $userid, 0, '/');
                setcookie('step', 'second', 0 , '/');
                $this->view->generate('index.view.php', [
                    'countUser' => $this->model->getCountUser()[0]
                ]);
            }
        }
    }

    /**
     * Save user information from step two to the database.
     */
    public function update()
    {
        if (! empty(filter_input_array(INPUT_POST))) {
            $config = require __DIR__ . '/../config/config.php';
            $target = null;

            if (isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name'])) {
                $imageName = $_FILES['photo']['name'];
                $target = 'img/users/' . $imageName;
                if (!is_dir('img/users/')) {
                    mkdir('img/users/');
                }
                move_uploaded_file($_FILES['photo']['tmp_name'], $target);
            }
            $this->model = new UsersModel();

            if ($this->model->update(filter_input_array(INPUT_POST), $target)) {
                setcookie('step', 'three', 0, '/');
                $this->view->generate('index.view.php', [
                    'countUser' => $this->model->getCountUser()[0],
                    'config' => $config['share'],
                ]);
            }
        }
    }

    /**
     * Cheching email for exists in database.
     */
    public function emailCheck()
    {
        if (filter_has_var(INPUT_POST, 'email')) {
            $this->model = new UsersModel();
            if($this->model->checkExistsEmail(filter_input(INPUT_POST, 'email'))) {
                echo "false";
            } else {
                echo "true";
            }
        }

    }
}
