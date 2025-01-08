<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    public function index():string
    {
        return view('login-form');
    }

    public function login():string
    {
        return view('login-form');
    } 
    public function login_submit()
    {
        //return redirect()->to('/dashboard');
        echo('Formulario Submetido');
    }
}
