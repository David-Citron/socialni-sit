<?php

namespace App\Controllers;

class Home extends BaseController
{
    var $session;

    public function __construct()
    {
        $this->session = session();
    }
    
    public function showAccounts()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM uzivatel');
        $accounts = $query->getResult();
        echo '<h1>User Accounts</h1>';
        foreach($accounts as $account)
        {
            echo '<h2>Account - '.$account->id.'</h2>';
            echo 'Username: '.$account->uzivatelske_jmeno.'<br>';
            echo 'Password: '.$account->heslo.'<br>';
            echo 'Email: '.$account->email.'<br>';
            echo 'Admin: '.$account->admin.'<br>';
        }
    }

    public function showSignInForm()
    {
        $data['error'] = $this->session->getFlashdata('error');
        return view('login.php', $data);
    }
    
    public function showSignUpForm()
    {
        return view('register.php');
    }
    public function showMainPage()
    {
        return view('mainPage.php');
    }
}
