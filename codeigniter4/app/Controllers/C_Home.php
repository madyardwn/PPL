<?php

namespace App\Controllers;

class C_Home extends BaseController
{
    public function index()
    {
        // template
        $data = [
            'title' => 'Home',
        ];
        return view('pages/v_home', $data);
    }
}
