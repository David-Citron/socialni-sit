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
    
    // Method register tries to create a new user account record in database
    // It is optimized for receiving POST data
    // Passwords get hashed before saving
    function register()
    {
        $newUser = [
            'uzivatelske_jmeno' => $this->request->getVar('name'),
            'heslo' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'email' => $this->request->getVar('email'),
            'datum_narozeni' => $this->request->getVar('birthday')
        ];
        $this->userModel->insert($newUser);
        $this->setSessionData($newUser);
        return redirect()->to('/');
    }

    // Method login tries to log user into the system
    // It is optimized for receiving POST data
    // If user gets logged in he gets redirected to home page
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
            $this->setSessionData($userData);
            return redirect()->to('/');
        }else
        {
            echo 'Wrong password';
        }
    }

    // This method is primary made for AuthFilter
    // It returns true if user is logged in
    // When this method returns false it means user is not logged in
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

    // After calling this method user gets logged out
    function logOut()
    {
        $this->session->remove('username');
        $this->session->remove('password');
        $this->session->remove('admin');
        return redirect()->to('login');
    }

    // This method sets all required data into current session
    // Parameter data should receive array consisting of user data
    function setSessionData($data)
    {
        $this->session->set('username', $data->uzivatelske_jmeno);
        $this->session->set('password', $data->heslo);
        if(isset($data->admin) && $data->admin == 1)
        {
            $this->session->set('admin', true);
        }else
        {
            $this->session->set('admin', false);
        }
    }
}