<?php
namespace App\Services;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class ProductService  extends CommonService
{

    public function __construct()
    {
        $this->model = new Product();
    }


    public function getAll($page=1,$perPageLimit = 500)
    {
        $offset = ($page-1) * $perPageLimit;
        $products =  $this->model->orderBy('id', 'DESC')->findAll($perPageLimit,$offset);

        if(empty($products)){
           return $products;
        }

        $data=[];
        foreach ($products as $product) {
            $category = (new Category)->find($product['category_id']);
            $brand = (new Brand)->find($product['brand_id']);
            $product['category'] = $category;
            $product['brand'] = $brand;
            $data[] = $product;
        }

        return $data;

    }


    public function find($id)
    {
        $data =  $this->model->where('id', $id)->first();

        $category = (new Category)->find($data['category_id']);
        $brand = (new Brand)->find($data['brand_id']);
        $product['category'] = $category;
        $product['brand'] = $brand;
        $product = array_merge($data,$product);
        return $product;
    }

}