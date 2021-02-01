<?php

class Connection {

    /**
     * Connect with database.
     */
    public static function make($config)
    {
        try {
            return new PDO(

                $config['connection'].";dbname=".$config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (Exception $ex) { die($ex->getMessage()); }
    }
}

