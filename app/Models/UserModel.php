<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name', 'email', 'password'];
    protected $useTimestamps = true;

    // Validation rules
    protected $validationRules      = [
        'name' => 'required|min_length[3]|max_length[50]',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[6]'
    ];
    protected $validationMessages   = [
        'email' => [
            'is_unique' => 'This email is already registered.'
        ]
    ];


    // hash password before saving
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    // Find user by email
    public function findUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
