<?php

namespace App\Controllers\Trackwise;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Config\Services;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/trackwise/dashboard');
        }

        return view('trackwise/auth/login');
    }

    public function register()
    {
        return view('trackwise/auth/register');
    }

    public function forgotPassword()
    {
        return view('trackwise/auth/forgot_password');
    }

    public function loginProcess()
    {
        $model    = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if ($username === null || $password === null) {
            return redirect()->back()->with('error', 'Username and password are required.');
        }

        $user = $model->findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'userId'     => $user['id'],
                'username'   => $user['username'],
                'isLoggedIn' => true,
            ]);

            return redirect()->to('/trackwise/dashboard');
        }

        return redirect()->back()->with('error', 'Invalid username or password. If you registered before the login fix, please register again.');
    }

    public function store()
    {
        $userModel = new UserModel();
        $password  = $this->request->getPost('password');
        $confirm   = $this->request->getPost('confirm_password');
        $username  = $this->request->getPost('username');
        $email     = $this->request->getPost('email');

        if (! $this->validate([
            'username' => 'required|min_length[3]|max_length[100]',
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ])) {
            return redirect()->back()->withInput()->with('error', implode(' ', $this->validator->getErrors()));
        }

        if ($password !== $confirm) {
            return redirect()->back()->withInput()->with('error', 'Passwords do not match.');
        }

        if ($userModel->where('username', $username)->first()) {
            return redirect()->back()->with('error', 'Username already taken.');
        }

        $userId = $userModel->insert([
            'username' => $username,
            'email'    => $email,
            'password' => $password,
        ]);

        if (! $userId) {
            return redirect()->back()->with('error', 'Registration failed. Please try again.');
        }

        $this->sendWelcomeEmail($email, $username);

        return redirect()->to('/trackwise/auth/login')->with('message', 'Registration successful! Please log in.');
    }

    public function resetLink()
    {
        return redirect()->to('/trackwise/auth/login')->with('message', 'Reset link sent! Check your email.');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/trackwise');
    }

    private function sendWelcomeEmail(?string $email, string $username): void
    {
        $to = $email ?: ($username . '@trackwise.local');

        $emailService = Services::email();
        $emailService->setFrom('noreply@trackwise.local', 'TRACKWISE');
        $emailService->setTo($to);
        $emailService->setSubject('Welcome to TRACKWISE');

        $htmlMessage = '<h1>Welcome, ' . esc($username, 'html') . '!</h1>'
            . '<p>Your account was created successfully. Start logging study sessions today.</p>';
        $textMessage = "Welcome, {$username}!\n\nYour account was created successfully.";

        $emailService->setMessage($htmlMessage);
        $emailService->setAltMessage($textMessage);
        $emailService->setMailType('html');

        $sent = false;
        try {
            $sent = $emailService->send();
        } catch (\Throwable $e) {
            log_message('error', 'Registration email failed: ' . $e->getMessage());
        }

        $logLine = date('Y-m-d H:i:s') . ' | to=' . $to . ' | sent=' . ($sent ? 'yes' : 'no') . ' | user=' . $username . PHP_EOL;
        file_put_contents(WRITEPATH . 'logs/email.log', $logLine, FILE_APPEND);
    }
}
