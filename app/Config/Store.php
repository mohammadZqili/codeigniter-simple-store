<?php

namespace Config;

abstract class Store
{

    public $viewLayout = 'App\Views\components\layout';
    public $landingRoute;


    protected $viewFolder = 'App\Views';
    protected $modelName;


    /**
     * --------------------------------------------------------------------
     * Views used by Auth Controllers
     * --------------------------------------------------------------------
     *
     * @var array
     */


    public function __construct()
    {
        if (logged_in()) {
            if (in_groups('customer')) {
                $this->setViews('customer');
            } else {
                $this->setViews('admin');
            }
        }
    }

    public $views = [
        'list' => 'index',
        'create' => 'add',
        'edit' => 'edit',
        'show' => 'show'
    ];

    private function setViews($folderPartName)
    {
        foreach ($this->views as $key => $value) {
            $this->views[$key] = "$this->viewFolder\\$folderPartName\\$this->modelName\\" . $this->views[$key];
        }

    }


}