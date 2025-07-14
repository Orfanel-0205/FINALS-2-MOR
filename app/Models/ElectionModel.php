<?php

namespace App\Models;

use CodeIgniter\Model;

class ElectionModel extends Model
{
    protected $table         = 'elections';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'title', 'description', 'start_time', 'end_time', 'status'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
