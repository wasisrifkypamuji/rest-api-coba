<?php

namespace App\Models;

use CodeIgniter\Model;

class ReminderModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'reminder';
    protected $primaryKey       = 'id_reminder';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\Reminder';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
'id_reminder',
'id_task',
'reminder_date',
'reminder_time',
'message',
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

'id_task' =>'required',
'reminder_date' =>'required',
'reminder_time' =>'required',
'message' =>'required',
    ];
    protected $validationMessages   = [
'id_task' =>
[
    'required'=> 'silahkan masukan id_task'],
'reminder_date' =>
[
    'required'=> 'silahkan masukan reminder_date'],
'reminder_time' =>
[
    'required'=> 'silahkan masukan reminder_time'],
'message' =>
[
    'required'=> 'silahkan masukan message'],
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