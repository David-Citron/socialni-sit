<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        
        if ($db->initialize()) {
            echo "Database connection successful!";
        } else {
            echo "Failed to connect to the database.";
        }
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
