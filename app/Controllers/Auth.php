<?php

namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
    var $userModel;
    
    function __construct()
    {
        $this->userModel = new UserModel();
    }
    
    function register()
    {
        $newUser = [
            'uzivatelske_jmeno' => $this->request->getVar('name'),
            'heslo' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'email' => $this->request->getVar('email'),
            'datum_narozeni' => $this->request->getVar('birthday')
        ];
        $this->userModel->insert($newUser);
    }

    function login()
    {
        $loginName = $this->request->getVar('name');
        $password = $this->request->getVar('password');

        $accountByEmail = $this->userModel->where('email', $loginName)->first();
        $accountByUsername = $this->userModel->where('uzivatelske_jmeno', $loginName)->first();

        if(isset($accountByEmail))
        {
            $userData = $accountByEmail;
        }else
        {
            $userData = $accountByUsername;
        }

        if(!isset($userData))
        {
            echo 'Wrong username or email';
            return;
        }

        if (password_verify($password, $userData->heslo) == true)
        {
            echo 'Logged in';
        }else
        {
            echo 'Wrong password';
        }
    }
}