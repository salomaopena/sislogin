<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    public function index()
    {
        return redirect()->to(site_url('dashboard'));
    }

    public function login(): string
    {
        $errors = [];
        //validation error
        $validation_errors = session()->getFlashdata('validation_errors');
        if (!empty($validation_errors)) {
            $errors['validation_errors'] = $validation_errors;
        }

        $login_error = session()->getFlashdata('login_error');
        if (!empty($login_error)) {
            $errors['login_error'] = $login_error;
        }

        return view('login-form', $errors);
    }
    public function login_submit()
    {

        // Define the validation rules
        $validation = $this->validate([
            'username' => [
                'rules' => 'required|alpha_numeric', #valid_email
                'label'  => 'Usuário',
                'errors' => [
                    'required' => 'Por favor introduza um nome de utilizador no campo {field}.',
                    'alpha_numeric' => 'O nome de utilizador só pode conter letras e números.',
                    #'valid_email' => 'O nome de utilizador não é um endereço de email válido.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[3]|',
                'label'  => 'Palavra-passe',
                'errors' => [
                    'required' => 'Por favor introduza uma palavra-passe no campo {field}.',
                    'min_length' => 'A palavra-passe tem que ter pelo menos {param} caracteres.'
                ]

            ],
        ]);

        //Veriy if validation is valid
        if (!$validation) {
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        //Check if user exists and password is correct
        $user =  new User();
        $results = $user->verify_login($username, $password);

        if (!$results) {
            return redirect()->back()->withInput()->with('login_error', 'Login incorrecto.');
            
        } 

        // User is authenticated, save their session data
        $session_data_user = [
            'id' => $results->id,
            'username' => $results->username,
            'email' =>$results->email,
        ];

        // Set session data
        session()->set($session_data_user);

        return redirect()->to('/');
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function logout(){
        // Destroy the session
        session()->destroy();
        return redirect()->to(site_url('/'));
    }
}
