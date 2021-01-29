<?php

class QueryBuilder {

    protected $pdo;
    protected $last_id;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
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
    public function lastID()
    {
        return $this->pdo->lastInsertId();
    }
}
