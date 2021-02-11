<?php

namespace App\Core;

use PDO;

class QueryBuilder {

    private static $pdo;
    private $sQuery;
    private $connected = false;
    private $parameters;

    public function __construct()
    {
        $config = require __DIR__ . '../../app/config/config.php.example';

        $this->pdo = new PDO(

            $config['database']['connection'] . ";dbname=" . $config['database']['name'],
            $config['database']['username'],
            $config['database']['password'],
            $config['database']['options']
        );

        return $this->pdo;
    }

    /**
     * Creates a database query to insert a profile.
     * @param $table
     * @param $parameters Profile information from step two.
     */
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

 //----------------------------------------------------------------------------------
    public function query($query, $params = null, $fetchmMode = PDO::FETCH_ASSOC)
    {
        $query = trim($query);
        $rawStatement = explode(" ", $query);
        $this->init($query, $params);
        $statement = strtolower($rawStatement[0]);

        if ($statement === 'select' || $statement === 'show') {
            return $this->sQuery->fetchAll($fetchmMode);
        } else {
            if ($statement === 'insert' || $statement === 'update' || $statement === 'delete') {
                return $this->sQuery->rowCount();
            } else {
                return null;
            }
        }
    }

    private function init($query, $parameters)
    {
        if (! $this->connected) {
            $this->connect();
        }

        $this->parameters = $parameters;
        $this->sQuery = $this->pdo->prepare($this->buildParams($query, $this->parameters));

        if (! empty($this->parameters)) {
            if (array_key_exists(0, $parameters)) {
                $parametersType = true;
                array_unshift($this->parameters, "");
                unset($this->parameters[0]);
            } else {
                $parametersType = false;
            }
            foreach (array_keys($this->parameters) as $column) {
                $this->sQuery->bindParam($parametersType ? intval($column) : ":".$column, $this->parameters[$column]);
            }
        }

        $this->sQuery->execute();
        $this->parameters = array();
    }

    private function buildParams($query, $params = array())
    {
        if (! empty($params)) {
            $arrayParameterFound = false;

            foreach ($params as $parameterKey => $parameter) {
                if (is_array($parameter)) {
                    $arrayParameterFound = true;
                    $in = "";
                    foreach ($parameter as $key => $value) {
                        $namePlaceholder = $parameterKey."_".$key;
                        // concatenates params as named placeholders
                        $in .= ":".$namePlaceholder.", ";
                        // adds each single parameter to $params
                        $params[$namePlaceholder] = $value;
                    }
                    $in = rtrim($in, ", ");
                    $query = preg_replace("/:".$parameterKey."/", $in, $query);
                    // removes array form $params
                    unset($params[$parameterKey]);
                }
            }
            // updates $this->params if $params and $query have changed
            if ($arrayParameterFound) {
                $this->parameters = $params;
            }
        }

        return $query;
    }
    //----------------------------------------------------------------------------------






    public function connect()
    {

        if (self::$pdo === null) {
            self::$pdo = new self();
        }

        return self::$pdo;
    }

}
