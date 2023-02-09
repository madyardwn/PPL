<?php

namespace App\Controllers;

class C_Info extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Info',
        ];
        return view('pages/v_info', $data);
    }
}
