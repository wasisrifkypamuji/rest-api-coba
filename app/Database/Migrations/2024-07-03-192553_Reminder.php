<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reminder extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_reminder' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'id_task' => [
                'type' => 'INT',
                'null' => false,
            ],
            'reminder_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'reminder_time' => [
                'type' => 'TIME',
                'null' => true,
            ],
            'message' => [
                'type' => 'VARCHAR',
                'constraint' => 1028,
            ],
        ]);

        $this->forge->addKey('id_reminder', true);
        $this->forge->addForeignKey('id_task', 'task', 'id_task');
        $this->forge->createTable('reminder');
    }

    public function down()
    {
        $this->forge->dropTable('reminder');
    }
}