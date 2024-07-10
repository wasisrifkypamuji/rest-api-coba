<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Attachment extends Seeder
{
    public function run()
    {
        $data = [
            [
'id_attachment' =>'4',
'id_task' =>'1',
'gambar' =>'bom.png',
            ],        
            [
'id_attachment' =>'5',
'id_task' =>'2',
'gambar' =>'pau.png',
            ],        
];

        $this->db->table('attachment')->insertBatch($data);
    }
}
