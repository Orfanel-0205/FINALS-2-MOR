<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserSeederController extends Controller
{
    public function createUser()
    {
        $userModel = new UserModel();

        $data = [
            'username' => 'admin',
            'password' => 'admin123', // this will be hashed automatically
            'email'    => 'admin@example.com',
            'role'     => 'admin',
            'picture'  => 'default.jpg',
            'bio'      => 'System Administrator'
        ];

        if ($userModel->insert($data)) {
            echo "✅ User created successfully.";
        } else {
            echo "❌ Failed to create user.";
        }
    }
}
