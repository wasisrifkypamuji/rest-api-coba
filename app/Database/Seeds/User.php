<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [
            [
            'id_user' =>'1',
            'username' =>'acumalaka',
            'email' =>'acumalaka@gmail.com',
            'password' =>'acumalaka123',
        ],
        [
            'id_user' =>'2',
            'username' =>'abcd',
            'email' =>'abcd@gmail.com',
            'password' =>'abcd123',
        ]
        ];

        $this->db->table('user')->insertBatch($data);
    }
}
