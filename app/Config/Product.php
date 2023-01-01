<?php

namespace Config;


class Product extends Store
{

    public $viewLayout = 'App\Views\components\layout';
    public $viewFolder = 'App\Views';
    public $modelName = "product";
    public $landingRoute = '/products';

}
