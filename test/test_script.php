<?php

$user = $app['database']->insertUser($_POST['firstname']);

$result = "done!";