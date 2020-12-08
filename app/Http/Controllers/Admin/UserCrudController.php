<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ArticleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    /*use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;*/
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    /*use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;*/
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\User');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/user');
        $this->crud->setEntityNameStrings('user', 'users');

        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Name',
                'type' => 'text'
            ],[
                'name' => 'email',
                'label' => 'Email',
                'type' => 'text'
            ],[
                'name' => 'isAdmin',
                'label' => 'Admin',
                'type' => 'checkbox'
            ]

        ]);

        $this->crud->setColumns([
            [
                'name' => 'id',
                'label' => 'ID',
                'type' => 'numeric'
            ],[
                'name' => 'name',
                'label' => 'Name',
                'type' => 'text'
            ],[
                'name' => 'email',
                'label' => 'Email',
                'type' => 'text'
            ],[
                'name' => 'isAdmin',
                'label' => 'Admin',
                'type' => 'check'
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
        $this->crud->setValidation(UserRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
