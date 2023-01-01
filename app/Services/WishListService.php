<?php

namespace App\Services;

use App\Models\Product;
use App\Models\WishList;

class WishListService extends CommonService
{
    public function __construct()
    {
        $this->model = new WishList();
        $this->user = user();
    }


    public function getAll($page = 1, $perPageLimit = 500)
    {
        $offset = ($page - 1) * $perPageLimit;
        $whishProducts = $this->model->where("user_id", $this->user->id)->orderBy('id', 'DESC')->findAll($perPageLimit, $offset);
        $data = [];
        foreach ($whishProducts as $whishProduct) {
            $productData = (new Product())->find($whishProduct['product_id']);
            $data[] = array_merge($whishProduct, ['product' => $productData]);

        }
        return $data;
    }

    public function insert($data)
    {
        $data = array_merge(['user_id' => $this->user->id], $data);
        $isExist = $this->model->where($data)->first();
        if (!empty($isExist)) {
            return false;
        }
        return $this->model->insert($data);
    }

    public function update($id, $data)
    {
        $data = array_merge(['user_id' => $this->user->id], $data);
        return $this->model->update($id, $data);
    }

    public function find($id)
    {

        return $this->model->where("user_id", $this->user->id)->where('id', $id)->first();
    }


    public function delete($id)
    {

        return $this->model->where('id', $id)->delete($id);
    }

    function empty()
    {
        return $this->model->where('user_id', $this->user->id)->delete();
    }

}