<?php

namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
    var $userModel;
    var $session;
    
    function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = session();
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

        if (password_verify($password, $userData->heslo))
        {
            $this->session->set('username', $userData->uzivatelske_jmeno);
            $this->session->set('password', $userData->heslo);
            return redirect()->to('/');
        }else
        {
            echo 'Wrong password';
        }
    }

    function checkLogin()
    {
        $username = $this->session->get('username');
        $password = $this->session->get('password');
        $account = $this->userModel->where('uzivatelske_jmeno', $username)->first();
        if(!isset($account))
        {
            return false;
        }
        if (strcmp($password, $account->heslo) == 0)
        {
            return true;
        }else
        {
            return false;
        }
    }

    function logOut()
    {
        $this->session->remove('username');
        $this->session->remove('password');
        return redirect()->to('login');
    }
}