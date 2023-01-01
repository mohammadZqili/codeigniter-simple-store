<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Product as ProductModel;
use App\Services\BrandService;
use App\Services\CategoryService;
use App\Services\ProductService;

class ProductController extends BaseController
{

    public function __construct()
    {
        $this->config = config('Product');
        $this->auth = service('authentication');
        $this->service = new ProductService();

    }

    public function index()
    {
        $page = $this->request->getVar('page') ?? 1;
        $data['products'] = $this->service->getAll($page);
        $data['categories'] = (new CategoryService())->getAll();
        $data['brands'] = (new BrandService())->getAll();
        return $this->_render($this->config->views['list'], $data);
    }

    public function create(): string
    {
        $data['brands'] = (new BrandService)->getAll();
        $data['categories'] = (new CategoryService)->getAll();
        return $this->_render($this->config->views['create'],$data);
    }

    // insert data
    public function store()
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'model' => $this->request->getVar('model'),
            'specifications' => $this->request->getVar('specifications'),
            'color' => $this->request->getVar('color'),
            'count' => $this->request->getVar('count'),
            'price' => $this->request->getVar('price'),
            'brand_id' => $this->request->getVar('brand_id'),
            'category_id' => $this->request->getVar('category_id')
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
        return $this->response->redirect(site_url('/products'));
    }


    public function single($id = null)
    {
        $data['brands'] = (new BrandService)->getAll();
        $data['categories'] = (new CategoryService)->getAll();
        $data['product'] = $this->service->find($id);

        return $this->_render($this->config->views['edit'], $data);
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'model' => $this->request->getVar('model'),
            'specifications' => $this->request->getVar('specifications'),
            'color' => $this->request->getVar('color'),
            'count' => $this->request->getVar('count'),
            'price' => $this->request->getVar('price'),
            'brand_id' => $this->request->getVar('brand_id'),
            'category_id' => $this->request->getVar('category_id')
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

        return $this->response->redirect(site_url('/products'));
    }

    public function delete($id = null)
    {
        $this->service->delete($id);
        return $this->response->redirect(site_url('/products'));
    }

}
