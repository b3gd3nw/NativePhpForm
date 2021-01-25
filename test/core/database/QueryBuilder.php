<?php

class QueryBuilder {

    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function insertUser($table, $parameters)
    {
//        $statement = $this->pdo->exec("INSERT INTO Users (first_name) VALUES ('$fname')");
//
////        $statement->executed();
//
//        return $statement->fetchAll(PDO::FETCH_CLASS);


        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ',array_keys($parameters)),
            ':' . implode(', :',array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);


            $statement->execute($parameters);
        } catch (Exception $e) {
            die("ERR");
        }

    }

    public function selectAll($table)
    {
 //       var_dump(21);
        $sql = 'select * from {$table}';
        try {
            $statement = $this->pdo->prepare($sql);


            $statement->execute('');
        } catch (Exception $e) {
            die("ERR");
        }

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
}
