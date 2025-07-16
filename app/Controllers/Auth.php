<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        helper(['form']);

        // Check for remember_me cookie first
        $rememberToken = $this->request->getCookie('remember_me');
        if ($rememberToken) {
            $model = new UserModel();
            $user = $model->where('remember_token', $rememberToken)->first();

            if ($user) {
                session()->set([
                    'isLoggedIn' => true,
                    'userId'     => $user['id'],
                    'username'   => $user['username'],
                    'role'       => $user['role'],
                ]);
                return redirect()->to($user['role'] === 'admin' ? '/admin/elections' : '/');
            }
        }

        // Handle form submission
        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $remember = $this->request->getPost('remember');

            $model = new UserModel();
            $user = $model->where('username', $username)->first();

            if ($user && password_verify($password, $user['password_hash'])) {
                session()->set([
                    'isLoggedIn' => true,
                    'userId'     => $user['id'],
                    'username'   => $user['username'],
                    'role'       => $user['role'],
                ]);

                // Handle remember me token
                if ($remember) {
                    $token = bin2hex(random_bytes(32));
                    // Update token in DB
                    $model->update($user['id'], ['remember_token' => $token]);
                    // Set cookie for 30 days
                    setcookie(
                        'remember_me',
                        $token,
                        time() + (86400 * 30),
                        '/',
                        '',
                        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on',
                        true
                    );
                }

                return redirect()->to($user['role'] === 'admin' ? '/admin/elections' : '/');
            }

            session()->setFlashdata('error', 'Invalid credentials');
        }

        return view('auth/login');
    }

    public function logout()
    {
        // Clear session
        session()->destroy();

        // Clear remember_me cookie
        setcookie('remember_me', '', time() - 3600, '/');

        return redirect()->to('/auth/login');
    }
}
