<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QuoteRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class QuoteCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class QuoteCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Quote');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/quote');
        $this->crud->setEntityNameStrings('quote', 'quotes');

        $this->crud->addFields([
            [
                'name'     => 'en',
                'label'    => "English",
                'fake'     => true,
                'store_in' => 'text' // [optional]
            ],
            [
                'name'     => 'ru',
                'label'    => "Russian",
                'fake'     => true,
                'store_in' => 'text' // [optional]
            ],
        ]);

        $this->crud->setColumns([
            [
                'name'  => 'text', // The db column name
                'label' => 'Quotes', // Table column heading
                'type'  => 'array'
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
        $this->crud->setValidation(QuoteRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
