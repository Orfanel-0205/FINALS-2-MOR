<?php

namespace App\Models;

use CodeIgniter\Model;

class CandidateModel extends Model
{
    protected $table         = 'candidates';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'election_id', 'name', 'description', 'photo'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
