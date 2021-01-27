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
//        var_dump($parameters);
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
        $this->last_id = $this->pdo->lastInsertId();
        var_dump.die($this->last_id);
//        var_dump(4);
    }

    public function  update($table, $parameters)
    {

        $sql = sprintf(
          'update %s set %s where (%s)',
            $table,
            implode(', ', json_decode($parameters, true)),
            '1'
        );
        var_dump.die($sql);
        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch (Exception $e) {
            die('UPDATE_ERR');
        }


    }
}
