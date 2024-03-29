<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\Auth;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {   
        $authController = new Auth();
        if(!$authController->checkAdmin())
        {
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}