<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class Auth extends BaseController
{
    /**
     * Show login page
     * If user is already logged in, redirect to dashboard
     */
    public function login()
    {
        // Check if user is already logged in
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }

        // Pass data to view
        $data = [
            'title' => 'Login - Welcome Back',
            'pageType' => 'auth'
        ];
        return view('auth/login', $data);
    }

    /**
     * Process login form submission
     * Authenticate user against database
     */
    public function check()
    {
        $userModel = new UserModel();

        // Get form data  
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Basic validation
        if (empty($email) || empty($password)) {
            return redirect()->to('/login')->with('error', 'Please fill in all fields');
        }

        // Find user in database by email
        $user = $userModel->findUserByEmail($email);

        // Check if user exists and password matches
        if ($user && password_verify($password, $user['password'])) {
            // Authentication successful - set session data
            session()->set([
                'user_id' => $user['id'],
                'username' => $user['name'],
                'user_email' => $user['email'],
                'logged_in' => true,
                'login_time' => time()
            ]);
            return redirect()->to('/dashboard')->with('message', 'Welcome back, ' . $user['name'] . '!');
        } else {
            // Authentication failed
            return redirect()->to('/login')->with('error', 'Invalid email or password. Please try again.');
        }
    }

    /**
     * Show registration form
     * If user is already logged in, redirect to dashboard
     */
    public function register()
    {
        // Check if user is already logged in
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }

        // Pass data to view
        $data = [
            'title' => 'Register - Join Us Today',
            'pageType' => 'auth'
        ];
        return view('auth/register', $data);
    }

    /**
     * Process registration form submission
     * Create new user account in database
     */
    public function processRegister()
    {
        $userModel = new UserModel();

        // Get form data
        $name = trim($this->request->getPost('name'));
        $email = strtolower(trim($this->request->getPost('email')));
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        // Client-side validation backup
        if (empty($name) || empty($email) || empty($password)) {
            return redirect()->to('/register')->with('error', 'Please fill in all fields');
        }

        if ($password !== $confirmPassword) {
            return redirect()->to('/register')->with('error', 'Passwords do not match');
        }

        if (strlen($password) < 6) {
            return redirect()->to('/register')->with('error', 'Password must be at least 6 characters long');
        }

        // Prepare data for insertion
        $data = [
            'name'     => $name,
            'email'    => $email,
            'password' => $password // Will be hashed automatically by model
        ];

        // Try to insert user (model handles validation and password hashing)
        if ($userModel->insert($data)) {
            // Registration successful
            return redirect()->to('/login')->with('message', 'Account created successfully! Please login with your credentials.');
        } else {
            // Registration failed - get validation errors from model
            $errors = $userModel->errors();

            // Check if it's a duplicate email error
            if (isset($errors['email']) && strpos($errors['email'], 'is_unique') !== false) {
                return redirect()->to('/register')
                    ->withInput()
                    ->with('error', 'This email address is already registered. Please use a different email or try logging in.');
            }

            return redirect()->to('/register')
                ->withInput()
                ->with('errors', $errors);
        }
    }

    /**
     * Logout user
     * Destroy session and redirect to login
     */
    public function logout()
    {
        $username = session()->get('username');
        session()->destroy();
        return redirect()->to('/login')->with('message', 'Goodbye' . ($username ? ', ' . $username : '') . '! You have been logged out successfully.');
    }
}
