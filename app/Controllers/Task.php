<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Task extends ResourceController
{
    protected $modelName = 'App\Models\TaskModel';
    protected $format = 'json';
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        if(!$this->model->find($id)) {
            return $this->fail('Task tidak ditemukan');
        }
        return $this->respond($this->model->find($id));
    }

    public function new()
    {
    }

    public function create()
    {
        $data = $this->request->getPost();
        $task = new \App\Entities\Task();
        $task->fill($data);

        if (!$this->validate($this->model->validationRules,$this->model->validationMessages)) {
            return $this->fail($this->validator->getErrors());
        }

        if ($this->model->save($task)) {
            return $this->respondCreated($data, "Task berhasil di buat");
        }
        
    }

    public function edit($id = null)
    {
    }

    public function update($id = null)
    {
        $data=$this->request->getRawInput();
        $data['id_task']=$id;

        if (!$this->model->find($id)) {
            return $this->fail("task tidak ditemukan");
        }

        $task=new \App\Entities\Task();
        $task->fill($data);

        if (!$this->validate($this->model->validationRules,$this->model->validationMessages)) {
            return $this->fail($this-> validator->getErrors());
        }

        if ($this->model->save($task)) {
            return $this->respondUpdated($data, "task berhasil di rubah");
        }
        
    }

    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->fail("Task tidak ditemukan");
        }
        if ($this->model->delete($id)) {
            return $this->respondDeleted("Task dengan id $id berhasil dihapus");
        }
    }
}