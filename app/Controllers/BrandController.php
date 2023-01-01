<?php

namespace App\Controllers;

use App\Models\Brand as BrandModel;
use App\Services\BrandService;

class BrandController extends BaseController
{

    public function __construct()
    {
        $this->config = config('Brand');
        $this->auth = service('authentication');
        $this->service = new BrandService();
    }

    public function index()
    {
        $page = $this->request->getVar('page') ?? 1;
        $data['brands'] = $this->service->getAll($page);

        return $this->_render($this->config->views['list'], $data);
    }

    public function create(): string
    {
        return $this->_render($this->config->views['create']);
    }

    // insert data
    public function store()
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'slogan' => $this->request->getVar('slogan'),
            'description' => $this->request->getVar('description')
        ];
        $file = $this->request->getFile('image');

        $path = [];
        if (!empty($file) && $file->isFile() && $file->isValid()) {
            $this->validate([
                'image' => 'uploaded[image]'
                    . '|mime_in[image/png,image/jpg,image/gif]'
                    . '|ext_in[png,jpg,gif]',
            ]);

            $path = $this->service->do_upload($file);

            if (empty($path)) {
                return $this->_render($this->config->view['add']);
            }
        }

        $this->service->insert(array_merge($data, $path));

        return $this->response->redirect(site_url('/brands'));
    }


    public function single($id = null)
    {
        $data['brand'] = $this->service->find($id);
        return $this->_render($this->config->views['edit'], $data);
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'slogan' => $this->request->getVar('slogan'),
            'description' => $this->request->getVar('description')
        ];

        $file = $this->request->getFile('image');
        $path = [];
        if (!empty($file) && $file->isFile() && $file->isValid()) {
            $this->validate([
                'image' => 'uploaded[image]'
                    . '|mime_in[image/png,image/jpg,image/gif]'
                    . '|ext_in[png,jpg,gif]',
            ]);
            $path = $this->service->do_upload($file);
            if (empty($path)) {
                return $this->_render($this->config->view['edit']);
            }
        }

        $this->service->update($id, array_merge($data, $path));

        return $this->response->redirect(site_url('/brands'));
    }

    public function delete($id = null)
    {
        $this->service->delete($id);
        return $this->response->redirect(site_url('/brands'));
    }


}
