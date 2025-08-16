<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    // show login page
    public function login()
    {
        // if user is logged in, redirect to dashboard
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }
        $data = ['title' => 'Login Page', 'pageType' => 'auth'];
        return view('login', $data);
    }

    // check login credentials
    public function check()
    {
        // get form data
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        // simple hardcoded check
        if ($username === 'admin' && $password === 'password') {
            // success,set session with login time
            session()->set([
                'username' => $username,
                'logged_in' => true,
                'login_time' => time()
            ]);
            return redirect()->to('/dashboard');
        } else {
            // error,redirect with error
            return redirect()->to('/login')->with('error', 'Invalid credentials');
        }
    }

    // logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('message', 'Logged out successfully');
    }
}
