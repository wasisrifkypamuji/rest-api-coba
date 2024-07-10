<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Reminder extends Seeder
{
    public function run()
    {
        $data = [
            [
'id_reminder' =>'1',
'id_task' =>'1',
'reminder_date' =>'2024-06-26',
'reminder_time' =>'14:00:00',
'message' =>'pesan reminder111',
            ],
            [
'id_reminder' =>'2',
'id_task' =>'2',
'reminder_date' =>'2024-06-26',
'reminder_time' =>'14:00:00',
'message' =>'pesan reminder222',
            ],
        ];

        $this->db->table('reminder')->insertBatch($data);
    }
}
