<?php

namespace app\controllers;

class ThreadController {

    public $tasks = [


        ];

    public function createThreads($tasks)
    {
        foreach ($tasks as $task) {
            $pid = pcntl_fork();

            if ($pid == -1) {
                exit("Error forking\n");
            }else if ($pid == 0) {
                execute_task($task);
                exit();
            }
        }
    }
}