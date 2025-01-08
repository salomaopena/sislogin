<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $users = [
            [
                'username' => 'Admin',
                'email' => 'admin@email.com',
                'password' => password_hash('Admin', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null
            ],
            [
                'username' => 'User1',
                'email' => 'user1@email.com',
                'password' => password_hash('User1', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at'=> null
            ]

        ];
        $this->db->table('users')->insertBatch($users);
    }
}
