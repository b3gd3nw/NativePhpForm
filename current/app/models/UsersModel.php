<?php

namespace App\Models;

use App\Core\Model;

class UsersModel extends Model
{
    public function getCountUser()
    {

        $sql = "
        SELECT COUNT(userid) as total FROM Users";
        try {
            $statement = $this->connect->prepare($sql);
            $statement->execute();
        } catch (Exception $e){
            die('SELECT_ALL_ERR');
        }

        return $statement->fetchAll();
    }
}