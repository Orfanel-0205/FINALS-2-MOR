<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table         = 'users';
    protected $primaryKey    = 'id';

    // Use 'password' in form input; it's hashed automatically
    protected $allowedFields = [
        'username', 'password', 'email', 'picture', 'bio', 'role', 'remember_token'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $returnType    = 'array';
    protected $beforeInsert  = ['hashPassword'];
    protected $beforeUpdate  = ['hashPassword'];

    /**
     * Automatically hashes password before insert/update
     */
    protected function hashPassword(array $data): array
    {
        if (isset($data['data']['password'])) {
            $data['data']['password_hash'] = password_hash(
                $data['data']['password'],
                PASSWORD_DEFAULT
            );
            unset($data['data']['password']);
        }
        return $data;
    }
}
