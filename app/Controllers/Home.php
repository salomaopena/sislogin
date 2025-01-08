<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    public function index()
    {
        $user = new User();
        $results = $user->findAll();
        dd($results);
    }

    public function login(): string
    {
        $errors = [];
        //validation error
        $validation_errors = session()->getFlashdata('validation_errors');
        if ($validation_errors) {
            $errors['validation_errors'] = $validation_errors;
        }
        return view('login-form',$errors);
    }
    public function login_submit()
    {

        // Define the validation rules
        $validation = $this->validate([
            'username' => [
                'rules' => 'required|alpha_numeric',#valid_email
                'label'  => 'Usuário',
                'errors' => [
                    'required' => 'Por favor introduza um nome de utilizador no campo {field}.',
                    'alpha_numeric' => 'O nome de utilizador só pode conter letras e números.',
                    #'valid_email' => 'O nome de utilizador não é um endereço de email válido.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]|',
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
        } else {
            // If validation fails, show the login form again with errors
            //return view('login-form', ['validation' => $validation]);
            echo('Nao foram encontrados erros');
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        // TODO: Implement authentication logic
        //dd($username, $password);
        //$ip = $this->request->getIPAddress();
        //$address = $this->request->getCookie();
        //$browser = $this->request->getUserAgent();
        //dd($ip, $address, $browser);

    }
}
