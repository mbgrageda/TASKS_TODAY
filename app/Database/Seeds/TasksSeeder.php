<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TasksSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'      => 'Review project requirements',
                'status'     => 'completed',
                'task_date'  => '2026-09-21',
                'created_at' => '2026-09-21 08:00:00',
            ],
            [
                'title'      => 'Complete database setup',
                'status'     => 'completed',
                'task_date'  => '2026-09-21',
                'created_at' => '2026-09-21 08:30:00',
            ],
            [
                'title'      => 'Build TaskModel',
                'status'     => 'pending',
                'task_date'  => '2026-09-21',
                'created_at' => '2026-09-21 09:00:00',
            ],
            [
                'title'      => 'Create dashboard view',
                'status'     => 'pending',
                'task_date'  => '2026-09-21',
                'created_at' => '2026-09-21 10:00:00',
            ],
            [
                'title'      => 'Test task filtering',
                'status'     => 'pending',
                'task_date'  => '2026-09-20',
                'created_at' => '2026-09-20 09:00:00',
            ],
            [
                'title'      => 'Update project documentation',
                'status'     => 'completed',
                'task_date'  => '2026-09-20',
                'created_at' => '2026-09-20 11:00:00',
            ],
            [
                'title'      => 'Review CodeIgniter routes',
                'status'     => 'completed',
                'task_date'  => '2026-09-19',
                'created_at' => '2026-09-19 13:00:00',
            ],
            [
                'title'      => 'Prepare project presentation',
                'status'     => 'pending',
                'task_date'  => '2026-09-19',
                'created_at' => '2026-09-19 15:00:00',
            ],
        ];

        $this->db->table('tasks')->insertBatch($data);
    }
}