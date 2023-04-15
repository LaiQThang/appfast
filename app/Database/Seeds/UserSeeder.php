<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email' => 'admin@gmail.com',
                'password' => password_hash('123', PASSWORD_BCRYPT),
                'name' => 'Tài khỏan quản trị'
            ],
            [
                'email' => 'thang@gmail.com',
                'password' => password_hash('123', PASSWORD_BCRYPT),
                'name' => 'Lại Quang Thắng'
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
