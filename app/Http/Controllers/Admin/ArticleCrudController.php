<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ArticleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ArticleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Article');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/article');
        $this->crud->setEntityNameStrings('article', 'articles');

        $this->crud->addFields([
            [
                'name' => 'title',
                'label' => 'Title',
                'type' => 'text'
            ],[
                'name' => 'text',
                'label' => 'Text',
                'type' => 'textarea'
            ],[
                'name' => 'user_id',
                'type' => 'select2',
                'label' => 'User',
                'entity' => 'user',
                'attribute' => 'name',
                'model' => "App\User"
            ],[
                'name' => 'category_id',
                'type' => 'select2',
                'label' => 'Category',
                'entity' => 'category',
                'attribute' => 'title',
                'model' => "App\Models\Category"
            ],[
                'name' => 'img',
                'label' => 'Image',
                'type' => 'text',
            ],[
                'name' => 'year',
                'label' => 'Year',
                'type' => 'text'
            ],[
                'name' => 'slug',
                'label' => 'Slug',
                'type' => 'text',
                'hint' => 'If you leave the field empty, the value is generated automatically.'
             ],[
                'name' => 'rating',
                'label' => 'Rating',
                'type' => 'number'
            ]

        ]);


        $this->crud->setColumns([
            [
                'name' => 'title',
                'label' => 'Title',
                'type' => 'text'
            ],[
                'name' => 'text',
                'label' => 'Text',
                'type' => 'textarea'
            ],[
                'name' => 'img',
                'label' => 'Image',
                'type' => 'text',
            ],[
                'name' => 'year',
                'label' => 'Year',
                'type' => 'text'
            ],[
                'name' => 'user_id',
                'type' => 'select',
                'label' => 'User',
                'entity' => 'user',
                'attribute' => 'name',
                'model' => "App\User"
            ],[
                'name' => 'category_id',
                'type' => 'select',
                'label' => 'Category',
                'entity' => 'category',
                'attribute' => 'title',
                'model' => "App\Models\Category"
            ],[
                'name' => 'slug',
                'label' => 'Slug',
                'type' => 'text'
            ],[
                'name' => 'rating',
                'label' => 'Rating',
                'type' => 'number'
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
        $this->crud->setValidation(ArticleRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
