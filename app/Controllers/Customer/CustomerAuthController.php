<?php

namespace App\Controllers\Customer;

use App\Controllers\AuthController;
use App\Controllers\BaseController;

class CustomerAuthController extends AuthController
{
    public function __construct()
    {
        parent::__construct();
        $this->config = config('CustomerAuth');
    }


}
