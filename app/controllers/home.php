<?php

class Home extends Controller
{
    public function index($name = '')
    {
        $user = $this->medol('User');
        $user->name = $name;

        $this->view('home/index', ['name' => $user->name]);
    }

    public function create($name = '')
    {
        if( ! empty($name)) {
            User::create([
                'name' => $name
            ]);
        }
    }
}