<?php
namespace App\Services;
use App\Models\Category;

class CategoryService extends CommonService
{

    public function __construct()
    {
        $this->model = new Category();
    }

}