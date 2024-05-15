<?php

namespace App\Controllers;
use App\Models\PostModel;
use App\Models\UserModel;

class Home extends BaseController
{
    var $session;
    var $postModel;
    var $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->postModel = new PostModel();
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
        $data['error'] = $this->session->getFlashdata('error');
        return view('register.php', $data);
    }

    public function showMainPage()
    {
        $user = $this->userModel->where('uzivatelske_jmeno', $this->session->get('username'))->first();
        $data['userID'] = $user->id;
        $data['userName'] = $user->uzivatelske_jmeno;
        return view('mainPage.php', $data);
    }

    public function showProfile($username)
    {
        $data['user'] = $this->userModel->where('uzivatelske_jmeno', $username)->first();
        if($data['user'] != null)
        {
            return view('profile', $data);
        }
        return view('errors/html/error_404.php', ['message'=>'Tento uživatel neexistuje']);
    }

    public function showPostCreateForm()
    {
        return view('createPost.php');
    }

    public function showPostEditForm($id)
    {
        $data['post'] = $this->postModel->find($id);
        return view('editPost.php', $data);
    }
}
