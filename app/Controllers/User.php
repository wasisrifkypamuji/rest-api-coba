<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class User extends ResourceController
{
    protected $modelName = 'App\Models\UserModel';
    protected $format = 'json';
    
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->fail("User tidak ditemukan");
        }
        return $this->respond($this->model->find($id));

    }

    public function create()
    {
        $data=$this->request->getPost();
        $user=new \App\Entities\User();
        $user->fill($data);

        if (!$this->validate($this->model->validationRules,$this->model->validationMessages)) {
            return $this->fail($this->validator->getErrors());
        }
        if ($this->model->save($user)) {
            return $this->respondCreated($data, "user berhasil dibuat");
        }
    }


    public function update($id = null)
    {
        $data=$this->request->getRawInput();
        $data['id_user']=$id;

        if (!$this->model->find($id)) {
            return $this->fail("user tidak ditemukan");
        }

        $user=new \App\Entities\User();
        $user->fill($data);

        if (!$this->validate($this->model->validationRules,$this->model->validationMessages)) {
            return $this->fail($this-> validator->getErrors());
        }

        if ($this->model->save($user)) {
            return $this->respondUpdated($data, "User berhasil di rubah");
        }
    }

    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->fail("User tidak ditemukan");
        }
        if ($this->model->delete($id)) {
            return $this->respondDeleted("User dengan id $id berhasil dihapus");
        }
    }
}