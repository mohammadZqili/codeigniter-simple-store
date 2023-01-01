<?php

namespace Config;


class AdminAuth extends Auth
{
    public $defaultUserGroup="admin";
    public $landingRoute = 'admin/';

    /**
     * --------------------------------------------------------------------
     * Views used by Auth Controllers
     * --------------------------------------------------------------------
     *
     * @var array
     */
    public $views = [
        'login'           => 'App\Views\Auth\admin\login',
        'register'        => 'App\Views\Auth\admin\register',
        'forgot'          => 'App\Views\Auth\admin\forgot',
        'reset'           => 'App\Views\Auth\admin\reset',
        'emailForgot'     => 'App\Views\Auth\admin\emails\forgot',
        'emailActivation' => 'App\Views\Auth\admin\emails\activation',
    ];

}
