<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        // check if logged in(protection)
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Please login first');
        }
        // get session data
        $data = [
            'username' => session()->get('username'),
            'login_time' => session()->get('login_time'),
            'current_time' => time(),
            'title' => 'Dashboard',

        ];
        return view('dashboard', $data);
    }
}
