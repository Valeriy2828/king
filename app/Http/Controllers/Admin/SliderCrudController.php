<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SliderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SliderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SliderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Slider');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/slider');
        $this->crud->setEntityNameStrings('Slider', 'Sliders');

        $this->crud->addFields([
            [
                'name' => 'title',
                'label' => 'Title',
                'type' => 'text'
            ],[
                'name' => 'desc',
                'label' => 'Description',
                'type' => 'textarea'
            ],[
                'name' => 'img',
                'label' => 'Image',
                'type' => 'text',
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
                'name' => 'desc',
                'label' => 'Description',
                'type' => 'textarea'
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
        $this->crud->setValidation(SliderRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
