<?php

namespace App\Controllers;

use App\Services\WishListService;

class WishListController extends BaseController
{

    public function __construct()
    {
        $this->config = config('WishList');
        $this->auth = service('authentication');
        $this->service = new WishListService();
    }


    public function index()
    {
        $page = $this->request->getVar('page') ?? 1;
        $data['wish'] = $this->service->getAll($page);

        return $this->_render($this->config->views['list'], $data);
    }

    public function store()
    {
        $data = ['product_id' => $this->request->getVar('product_id')];
        $this->service->insert($data);

        return $this->response->redirect(site_url('/wish'));
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        $data = [
            'user_id' => $this->request->getVar('user_id'),
            'product_id' => $this->request->getVar('product_id')
        ];

        $this->service->update($id, $data);
        return $this->response->redirect(site_url('/wish'));
    }

    public function delete($id = null)
    {
        $this->service->delete($id);
        return $this->response->redirect(site_url('/wish'));
    }


    function empty(){

        $this->service->empty();
        return $this->response->redirect(site_url('/wish'));

    }


}
