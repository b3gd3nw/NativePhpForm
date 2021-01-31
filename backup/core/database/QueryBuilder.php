<?php

class QueryBuilder {

    protected $pdo;
    protected $last_id;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function viewAll()
    {
//        var_dump.die(2);
        $sql = "
        select p.photo, first_name, last_name, report_subject, email  
        from Users s
        left JOIN Profile p on p.userid = s.userid";
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
        } catch (Exception $e){
            die('SELECT_ERR');
        }

        return $statement->fetchAll();
    }

    public function insert($table, $parameters)
    {
//        var_dump.die(12);
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
        $table,
        implode(', ', array_keys($parameters)),
        ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch (Exception $e) {
            die('INSERT_ERR');
        }

        return $this->pdo->lastInsertId();
    }

    public function  update($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)) . ', userid',
            ':' . implode(', :', array_keys($parameters)) . ', ' . filter_input_array(INPUT_COOKIE)['userID']
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch (Exception $e) {
            die('UPDATE_ERR');
        }
    }
    public function getCountUser()
    {
        $sql = "
        SELECT COUNT(userid) as total FROM Users";
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
        } catch (Exception $e){
            die('SELECT_ALL_ERR');
        }

        return $statement->fetchAll();
    }
}
