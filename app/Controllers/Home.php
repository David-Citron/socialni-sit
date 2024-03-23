<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
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
