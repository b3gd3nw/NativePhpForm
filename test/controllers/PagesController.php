<?php

class PagesController
{
    public function home ()
    {
        $users = App::get('database')->selectAll('Users');

        return view('index', ['users' => $users]);
    }

}