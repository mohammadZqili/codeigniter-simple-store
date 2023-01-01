<?php

namespace App\Services;

use App\Models\Brand as BrandModel;

class BrandService extends CommonService
{

    public function __construct()
    {
        $this->model = new BrandModel();
    }

}