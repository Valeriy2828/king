<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PortfolioRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PortfolioCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PortfolioCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Portfolio');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/portfolio');
        $this->crud->setEntityNameStrings('portfolio', 'portfolios');

        $this->crud->addFields([
            [
                'name' => 'title',
                'label' => 'Title',
                'type' => 'text'
            ],[
                'name' => 'text',
                'label' => 'Description',
                'type' => 'textarea'
            ],[
                'name' => 'img',
                'label' => 'Image',
                'type' => 'text',
            ],[
                'name' => 'customer',
                'label' => 'Customer',
                'type' => 'text'
            ],[
                'name' => 'director',
                'label' => 'Director',
                'type' => 'text'
            ],[
                'name' => 'year',
                'label' => 'Year',
                'type' => 'text'
            ],[
                'name' => 'slug',
                'label' => 'Slug',
                'type' => 'text',
                'hint' => 'If you leave the field empty, the value is generated automatically.'
            ]

        ]);

        $this->crud->setColumns([
            [
                'name' => 'title',
                'label' => 'Title',
                'type' => 'text'
            ],[
                'name' => 'img',
                'label' => 'Image',
                'type' => 'text'
            ],[
                'name' => 'text',
                'label' => 'Description',
                'type' => 'textarea'
            ],[
                'name' => 'customer',
                'label' => 'Customer',
                'type' => 'text'
            ],[
                'name' => 'director',
                'label' => 'Director',
                'type' => 'text'
            ],[
                'name' => 'year',
                'label' => 'Year',
                'type' => 'text'
            ],[
                'name' => 'slug',
                'label' => 'Slug',
                'type' => 'text'
            ]
        ]);
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->setFromDb();
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(PortfolioRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
