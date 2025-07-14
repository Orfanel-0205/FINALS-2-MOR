<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username'      => 'admin',
            'password_hash' => password_hash('admin123', PASSWORD_DEFAULT),
            'email'         => 'admin@example.com',
            'role'          => 'admin',
        ];
        $this->db->table('users')->insert($data);
    }
}
