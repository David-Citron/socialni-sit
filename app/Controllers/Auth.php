<?php

namespace App\Controllers;
use App\Models\UserModel;
use DateTime;

class Auth extends BaseController
{
    var $userModel;
    var $session;
    
    function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = session();
        $this->session->keepFlashdata('error');
    }
    
    // Method register tries to create a new user account record in database
    // It is optimized for receiving POST data
    // Passwords get hashed before saving
    function register()
    {
        $username = $this->request->getVar('name');
        $data = [
            'uzivatelske_jmeno' => $username,
            'heslo' => $this->request->getVar('password'),
            'heslo2' => $this->request->getVar('password2'),
            'email' => $this->request->getVar('email'),
            'datum_narozeni' => $this->request->getVar('birthday')
        ];
        
        if (!$this->validateRegistration($data))
        {
            return redirect()->to('register');
        }

        $newUser = $this->refactorRegistrationData($data);

        $defaultProfilePicPath = './assets/img/avatar.png';

        $newProfilePicPath = './assets/img/user/' . $data['uzivatelske_jmeno'] . '.png';

        if (!copy($defaultProfilePicPath, $newProfilePicPath)) {
            echo "Failed to copy $defaultProfilePicPath...\n";
            return redirect()->to('register')->with('error', 'Error - create image.');
        }

        $newUser['obrazek'] = $username.'.png';

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
            $this->session->setFlashdata('error', 'Účet nenalezen');
            return redirect()->to('/');
        }

        if (password_verify($password, $userData->heslo))
        {
            $this->setSessionData($userData);
            return redirect()->to('/');
        }else
        {
            $this->session->setFlashdata('error', 'Špatné heslo');
            return redirect()->to('/');
        }
    }

    // This method serves for changing password for logged in user
    // It is optimized for receiving PUT data
    function changePassword()
    {
        $currentPassword = $this->request->getVar('passwordCurrent');
        $newPassword1 = $this->request->getVar('passwordNew1');
        $newPassword2 = $this->request->getVar('passwordNew2');
        
        $currentAccount = $this->userModel->where($this->session->get('username'))->first();
        if(!isset($currentAccount))
        {
            // Not logged in
            return;
        }

        if(!password_verify($currentPassword, $currentAccount->heslo))
        {
            // Current password isn't matching with logged account
            return;
        }

        if(strcmp($newPassword1, $newPassword2) != 0)
        {
            // Passwords not matching
            return;
        }

        $currentAccount = (array)$currentAccount;
        $currentAccount['heslo'] = password_hash($newPassword1, PASSWORD_DEFAULT);
        $this->userModel->save($currentAccount);
        return redirect()->to('/');
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

    // Method checks if the logged in user has admin privileges
    // Returns true if he does
    // Returns false if he doesn't or when he is not logged in
    function checkAdmin()
    {
        if(!$this->session->has('admin'))
        {
            return false;
        }
        return $this->session->get('admin');
    }

    // User gets logged out after calling this method
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
        $data = (array)$data;
        $this->session->set('username', $data['uzivatelske_jmeno']);
        $this->session->set('password', $data['heslo']);
        if(isset($data['admin']) && $data['admin'] == 1)
        {
            $this->session->set('admin', true);
        }else
        {
            $this->session->set('admin', false);
        }
    }

    // This method validates array of data which has following content:
    // uzivatelske_jmeno - string
    // email - string
    // heslo1 - string
    // heslo2 - string
    // datum_narozeni - date
    // Returns true if data passed validation
    // Returns false if data didn't pass validation
    function validateRegistration($data)
    {
        $data = (array)$data;
        
        // Username characters validation
        $pattern = '/^[a-zA-Z0-9_\-]+$/';
        
        if (!preg_match($pattern, $data['uzivatelske_jmeno'])) {
            $this->session->setFlashdata('error', 'Uživatelské jméno smí obsahovat pouze písmena bez diakritiky, čísla, podtržítka a pomlčky');
            return false;
        }

        // Unique username validation
        $existingAccount = $this->userModel->where('uzivatelske_jmeno', $data['uzivatelske_jmeno'])->first();
        if (isset($existingAccount))
        {
            $this->session->setFlashdata('error', 'Uživatelské jméno již existuje');
            return false;
        }

        // Unique email validation
        $existingAccount = $this->userModel->where('email', $data['email'])->first();
        if (isset($existingAccount))
        {
            $this->session->setFlashdata('error', 'Email již existuje');
            return false;
        }

        // Passwords matching validation
        if (strcmp($data['heslo'], $data['heslo2']) != 0)
        {
            $this->session->setFlashdata('error', 'Hesla se neshodují');
            return false;
        }

        // Age validation
        $birthDate = new DateTime($data['datum_narozeni']);
        $currentDate = new DateTime();

        $age = $birthDate->diff($currentDate)->y;

        if ($age < 18) 
        {
            $this->session->setFlashdata('error', 'Musí vám být víc než 18 let');
            return false;
        }

        return true;
    }

    // This method takes array of data and removes unnecesary content
    // Returns array of data ready for database insertion
    function refactorRegistrationData(array $data)
    {
        $newUser = [
            'uzivatelske_jmeno' => $data['uzivatelske_jmeno'],
            'heslo' => password_hash($data['heslo'], PASSWORD_DEFAULT),
            'email' => $data['email'],
            'datum_narozeni' => $data['datum_narozeni']
        ];
        return $newUser;
    }
}