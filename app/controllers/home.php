<?php


class Home extends Controller
{
    public function __construct()
    {
        if( ! $_SESSION['auth']) {
            header("Location: ".LOGIN_URL);
        }
    }

    public function index($name = '')
    {
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


    public function profile()
    {
        $user = User::whereFacebookId($_SESSION['auth_user']['id'])->first();

        $this->view('home/profile', ['user' => $user]);
    }
}