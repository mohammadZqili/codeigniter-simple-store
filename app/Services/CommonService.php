<?php

namespace App\Services;

abstract class CommonService
{
    protected $model;


    public function getAll($page=1,$perPageLimit = 500)
    {
        $offset = ($page-1) * $perPageLimit;
        return $this->model->orderBy('id', 'DESC')->findAll($perPageLimit,$offset);
    }

    public function insert($data)
    {
        return $this->model->insert($data);
    }

    public function update($id, $data)
    {
        return $this->model->update($id, $data);
    }

    public function find($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function do_upload($file)
    {
        if (!$path = $file->store()) {
            return null;
        }
        $data = ['image' => $path];

        return $data;
    }


    public function delete($id){

        return $this->model->where('id', $id)->delete($id);
    }

}