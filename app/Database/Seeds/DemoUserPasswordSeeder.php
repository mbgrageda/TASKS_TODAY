<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DemoUserPasswordSeeder extends Seeder
{
    public function run()
    {
        $password = password_hash('Admin123!', PASSWORD_DEFAULT);

        $this->db->table('users')
            ->where('id', 1)
            ->update([
                'password' => $password,
            ]);
    }
}