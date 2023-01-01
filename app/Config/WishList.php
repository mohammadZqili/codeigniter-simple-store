<?php

namespace Config;


class WishList extends Store
{
    public $viewFolder = 'App\Views';
    public $modelName = "wish-list";
    public $landingRoute = '/wish';
    public $viewLayout = 'App\Views\components\layout';

    /**
     * --------------------------------------------------------------------
     * Views used by Auth Controllers
     * --------------------------------------------------------------------
     *
     * @var array
     */


    public function __construct()
    {
        $this->setViews('customer');
    }

    public $views = [
        'list' => 'index',
        'create' => 'add',
        'edit' => 'edit',
    ];

    private function setViews($folderPartName)
    {
        foreach ($this->views as $key => $value) {
            $this->views[$key] = "$this->viewFolder\\$folderPartName\\$this->modelName\\" . $this->views[$key];
        }

    }
}
