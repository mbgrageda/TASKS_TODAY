<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username'   => 'mbgrageda',
                'full_name'  => 'Marco Angelo B. Grageda',
                'email'      => 'mbgrageda@gmail.com',
                'created_at' => '2026-09-21 08:00:00',
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}