<?php

require "classes/Model(DataBase).php";
$DB = new DataBase();
var_dump($_POST);
$results = $DB->addToDB();