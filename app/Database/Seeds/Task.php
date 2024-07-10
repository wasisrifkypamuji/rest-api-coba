<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Task extends Seeder
{
    public function run()
    {
        $data = [
            [
'id_task' =>'1',
'id_user' =>'1',
'title' =>'coba coba',
'description' =>'deskrpsi cuyy',
'date' =>'2024-06-27',
'time' =>'15:00:00',
'id_kategori' =>'1',
'status'=>'false',
            ],
            [
'id_task' =>'2',
'id_user' =>'2',
'title' =>'laba laba',
'description' =>'deskripsi ges',
'date' =>'2024-06-27',
'time' =>'15:00:00',
'id_kategori' =>'2',
'status'=>'false',
            ]
        ];

        $this->db->table('task')->insertBatch($data);
    }
}
