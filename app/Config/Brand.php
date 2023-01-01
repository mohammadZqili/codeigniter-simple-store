<?php

namespace Config;


class Brand extends Store
{
    public $viewFolder = 'App\Views';
    public $modelName = "brand";
    public $landingRoute = '/brands';
    public $viewLayout = 'App\Views\components\layout';
}
