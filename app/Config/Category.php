<?php

namespace Config;


class Category extends Store
{
    public $landingRoute = '/categories';
    public $viewLayout = 'App\Views\components\layout';
    public $viewFolder = 'App\Views';
    public $modelName = "category";


}
