<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIsArchivedToTasks extends Migration
{
    public function up()
    {
        $fields = [
            'is_archived' => [
                'type'       => 'BOOLEAN',
                'default'    => false,
                'null'       => false,
            ],
        ];

        $this->forge->addColumn('tasks', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('tasks', 'is_archived');
    }
}