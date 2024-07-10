<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Reminder extends ResourceController
{
    protected $modelName = 'App\Models\ReminderModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        if(!$this->model->find($id)) {
            return $this->fail('Reminder tidak ditemukan');
        }
        return $this->respond($this->model->find($id));
    }

    public function new()
    {
    }

    public function create()
    {
        $data = $this->request->getPost();
        $reminder = new \App\Entities\Reminder();
        $reminder->fill($data);

        if (!$this->validate($this->model->validationRules,$this->model->validationMessages)) {
            return $this->fail($this->validator->getErrors());
        }

        if ($this->model->save($reminder)) {
            return $this->respondCreated($data, "Reminder berhasil di buat");
        }
        
    }

    public function edit($id = null)
    {
    }

    public function update($id = null)
    {
        $data=$this->request->getRawInput();
        $data['id_reminder']=$id;

        if (!$this->model->find($id)) {
            return $this->fail("reminder tidak ditemukan");
        }

        $reminder=new \App\Entities\Reminder();
        $reminder->fill($data);

        if (!$this->validate($this->model->validationRules,$this->model->validationMessages)) {
            return $this->fail($this-> validator->getErrors());
        }

        if ($this->model->save($reminder)) {
            return $this->respondUpdated($data, "reminder berhasil di rubah");
        }
        
    }

    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->fail("Reminder tidak ditemukan");
        }
        if ($this->model->delete($id)) {
            return $this->respondDeleted("Reminder dengan id $id berhasil dihapus");
        }
    }
}