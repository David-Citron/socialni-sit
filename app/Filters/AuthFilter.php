<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\Auth;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {   
        $authController = new Auth();
        if(!$authController->checkLogin())
        {
            return redirect()->to('login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}