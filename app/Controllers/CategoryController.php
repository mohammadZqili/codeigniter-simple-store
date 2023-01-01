<?php

namespace App\Controllers;

use App\Services\CategoryService;

class CategoryController extends BaseController
{

    public function __construct()
    {
        $this->config = config('Category');
        $this->auth = service('authentication');
        $this->service = new CategoryService();

    }

    public function index()
    {
        $page = $this->request->getVar('page') ?? 1;
        $data['categories'] = $this->service->getAll($page);
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
            'show_room' => $this->request->getVar('show_room'),
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
        return $this->response->redirect(site_url('/categories'));
    }


    public function single($id = null)
    {
        
        $data['category'] =  $this->service->find($id);
        return $this->_render($this->config->views['edit'], $data);
    }

    public function update()
    {
        
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'show_room' => $this->request->getVar('show_room'),
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
            $path = $this->do_upload($file);
            if (empty($path)) {
                return $this->_render($this->config->view['edit']);
            }
        }

        $this->service->update($id, array_merge($data, $path));
        return $this->response->redirect(site_url('/categories'));
    }

    public function delete($id = null)
    {
        $this->service->delete($id);
        return $this->response->redirect(site_url('/categories'));
    }

}
