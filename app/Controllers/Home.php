<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM uzivatel');
        var_dump($query->getResult());
    }

    public function showSignInForm()
    {
        return view('login.php');
    }
    
    public function showSignUpForm()
    {
        return view('register.php');
    }
    public function showContributions(){
        return view('mainPage.php');
    }
}
