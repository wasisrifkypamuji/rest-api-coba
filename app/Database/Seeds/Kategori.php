<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kategori extends Seeder
{
    public function run()
    {
        $data = [
            [
'id_kategori' =>'1',
'id_user' =>'1',
'nama_kategori' =>'all task',
            ],
            [
'id_kategori' =>'2',
'id_user' =>'2',
'nama_kategori' =>'all task',
            ],
        ];

        $this->db->table('kategori')->insertBatch($data);
    }
}
