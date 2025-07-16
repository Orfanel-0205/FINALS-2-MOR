<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();

        $userModel->insert([
            'username' => 'admin',
            'password' => 'admin123', // will be hashed automatically
            'email'    => 'admin@example.com',
            'role'     => 'admin',
            'bio'      => 'Default admin user',
            'picture'  => 'default.jpg'
        ]);
    }
}
