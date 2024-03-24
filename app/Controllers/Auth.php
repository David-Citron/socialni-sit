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
        $username = $this->request->getVar('name');
        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        $userData = $this->userModel->where('uzivatelske_jmeno', $username)->first();
        if (strcmp($password, $userData->heslo))
        {
            return redirect()->to('/');
        }else
        {
            echo 'Login failed!';
        }
    }
}