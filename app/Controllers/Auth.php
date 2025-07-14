<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        helper(['form']);
        if ($this->request->getMethod() === 'post') {
            $m = new UserModel();
            $user = $m->where('username', $this->request->getPost('username'))
                      ->first();
            if ($user && password_verify($this->request->getPost('password'), $user['password_hash'])) {
                session()->set([
                    'isLoggedIn' => true,
                    'userId'     => $user['id'],
                    'role'       => $user['role'],
                ]);
                return redirect()->to('/');
            }
            session()->setFlashdata('error', 'Invalid credentials');
        }
        echo view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
