<?php


class Home extends Controller
{
    public function index($name = '')
    {
        if( ! $_SESSION['auth']) {
            header("Location: /");
        }

        $user = $this->medol('User');
        $user->name = $name;



        $this->view('home/index', ['session' => $_SESSION]);
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