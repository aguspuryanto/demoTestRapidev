<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if(!session()->get('name')) {
            return redirect()->to('/login');
        }
        
        return view('welcome_message');
    }
}
