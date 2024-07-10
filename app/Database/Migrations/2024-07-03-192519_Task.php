<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Task extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_task' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'null' => false,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 1028,
            ],
            'date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'time' => [
                'type' => 'TIME',
                'null' => true,
            ],
            'id_kategori' => [
                'type' => 'INT',
                'null' => false,
            ],
            'status' => [
            'type' => 'BOOLEAN',
            'default' => false,
            'null' => false,
            ],
        ]);

        $this->forge->addKey('id_task', true);
        $this->forge->addForeignKey('id_user', 'user', 'id_user');
        $this->forge->addForeignKey('id_kategori', 'kategori', 'id_kategori');
        $this->forge->createTable('task');
    }

    public function down()
    {
        $this->forge->dropTable('task');
    }
}