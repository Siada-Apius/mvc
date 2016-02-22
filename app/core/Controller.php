<?php

class Controller
{
    public function medol($model)
    {
        require_once '../app/models/'. $model .'.php';

        //check if exist
        return new $model();
    }

    public function view($view, $data = [])
    {
        require_once '../app/view/'. $view .'.php';
    }
}