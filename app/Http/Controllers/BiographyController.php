<?php

namespace App\Http\Controllers;

use App\Repositories\BiographiesRepository;
use Illuminate\Http\Request;

class BiographyController extends SiteController
{
    public function __construct(BiographiesRepository $b_rep){

        parent::__construct(new\App\Repositories\MenusRepository(new \App\Models\Menu));

        $this->b_rep = $b_rep;

        $this->template = 'pink.biography'; //предопределение шаблона сайта
    }

    public function index(Request $request){

        $biographies = $this->getBiographies();

        $content = view('pink.biography_content')->with('biographies',$biographies)->render();
        $this->vars = array_add($this->vars,'content',$content);

        return $this->renderOutput();

    }

    public function getBiographies(){
        $biographies = $this->b_rep->get('*');
        return $biographies;
    }
}
