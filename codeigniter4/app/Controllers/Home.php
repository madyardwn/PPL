<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function showme($name = '', $age = 0)
    {
        echo "Hello $name, you are $age years old.";
    }
}
