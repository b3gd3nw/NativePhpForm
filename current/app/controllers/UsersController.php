<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Controller;
use App\Models\UsersModel;

class UsersController extends Controller
{
    public function index()
    {
        $this->model = new UsersModel();
        var_dump(4);
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
                    'countUser' => $this->model->getCountUser()[0],
                ]);
            }
        }
    }

    /**
     * Save user information from step two to the database.
     */
    public function update()
    {
        if (isset($_FILES['photo']['name']) && ! empty($_FILES['photo']['name'])) {
            $imageName = $_FILES['photo']['name'];
            $target = 'public/img/users/'.$imageName;
            if (! is_dir('public/img/users/')) {
                mkdir('public/img/users/');
            }
            move_uploaded_file($_FILES['photo']['tmp_name'], $target);
        }

        App::get('database')->update('Profile', [
            'company' => $_POST['company'],
            'position' => $_POST['position'],
            'about_me' => $_POST['about'],
            'photo' => $target
        ]);
        setcookie('step', 'three', 0 , '/');

          return redirect('');
    }

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
