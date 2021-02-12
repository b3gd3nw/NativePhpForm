<?php

namespace App\Core;

class View
{
    public function generate($view, $data = null)
    {
        if (is_array($data)) {
            extract($data);
        }
        include '../app/views/' . $view;
    }
}
