<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Attachment extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_attachment' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'id_task' => [
                'type' => 'INT',
                'null' => false,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 1028,
            ],
        ]);

        $this->forge->addKey('id_attachment', true);
        $this->forge->addForeignKey('id_task', 'task', 'id_task');
        $this->forge->createTable('attachment');
    }

    public function down()
    {
        $this->forge->dropTable('attachment');
    }
}