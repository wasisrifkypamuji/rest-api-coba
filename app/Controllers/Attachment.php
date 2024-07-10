<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Attachment extends ResourceController
{
    protected $modelName = 'App\Models\AttachmentModel';
    protected $format = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        $attachment = $this->model->find($id);
        if (!$attachment) {
            return $this->fail('Attachment tidak ditemukan', 404);
        }
        return $this->respond($attachment);
    }

    public function new()
    {
    }

    public function create()
    {
        $data = $this->request->getPost();
        $attachment = new \App\Entities\Attachment();
        $attachment->fill($data);

        if (!$this->validate($this->model->validationRules, $this->model->validationMessages)) {
            return $this->fail($this->validator->getErrors());
        }

        $gambar = $this->request->getFile('gambar');
            $namaGambar = $gambar->getRandomName();
            $gambar->move('gambar', $namaGambar);
            $this->model->insert([
                'id_task' => esc($this->request->getVar('id_task')),
                'gambar' => $namaGambar
            ]);
            return $this->respondCreated(['message' => 'gambar berhasil ditambahkan']);
        
    }

    public function edit($id = null)
    {
    }

    public function update($id = null)
    {
    }

    public function delete($id = null)
    {
    }
}
