<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ContactsController extends SiteController
{
    public function __construct(){

        parent::__construct(new\App\Repositories\MenusRepository(new \App\Models\Menu));


        $this->template = 'pink.biography'; //предопределение шаблона сайта
    }

    public function index(Request $request){

        $this->title = 'Biography';

        $content = view('pink.biography_content')->render();
        $this->vars = array_add($this->vars,'content',$content);

        return $this->renderOutput();
    }
}
