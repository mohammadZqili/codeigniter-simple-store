<?php

namespace App\Controllers\Admin;

use App\Controllers\AuthController;

class AdminAuthController extends AuthController
{

    public function __construct()
    {
        parent::__construct();
        $this->config = config('AdminAuth');
    }
}

