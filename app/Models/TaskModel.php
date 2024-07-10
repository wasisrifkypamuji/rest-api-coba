<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'task';
    protected $primaryKey       = 'id_task';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\Task';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
'id_task', 
'id_user', 
'title', 
'description', 
'date', 
'time', 
'id_kategori',
'status' 
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
            'id_user' => 'required',
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required',
            'id_kategori' => 'required',
    ];
    protected $validationMessages   = [
            'id_user' => [
                'required'=>'masukan id_user'
            ],
            'title' => [
                'required'=>'masukan title'
            ],
            'description' => [
                'required'=>'masukan description'
            ],
            'date' => [
                'required'=>'masukan date'
            ],
            'time' => [
                'required'=>'masukan time'
            ],
            'id_kategori' => [
                'required'=>'masukan id_kategori'
            ],
            'status' => [
                'required'=>'masukan status'
            ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}