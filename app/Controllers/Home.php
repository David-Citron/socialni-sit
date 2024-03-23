<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM uzivatel');
        $data['uzivatel'] = $query->getResult();
        var_dump($data);
        //return view('welcome_message');
    }

    public function showSignInForm()
    {
        return view('login.php');
    }
    
    public function showSignUpForm()
    {
        return view('register.php');
    }
}
