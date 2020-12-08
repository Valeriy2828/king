<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommentRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CommentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CommentCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    /*use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;*/
    /*use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;*/
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Comment');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/comment');
        $this->crud->setEntityNameStrings('comment', 'comments');

        $this->crud->setColumns([
            [
                'name' => 'id',
                'label' => 'ID',
                'type' => 'numeric'
            ],[
                'name' => 'user_id',
                'type' => 'select',
                'label' => 'User',
                'entity' => 'user',
                'attribute' => 'name',
                'model' => "App\User"
            ],[
                'name' => 'comments',
                'label' => 'Comments',
                'type' => 'textarea'
            ],[
                'name' => 'article_id',
                'type' => 'select',
                'label' => 'Article',
                'entity' => 'article',
                'attribute' => 'title',
                'model' => "App\Models\Article"
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
        $this->crud->setValidation(CommentRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
