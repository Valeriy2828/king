<?php

namespace App\Http\Controllers;

use App\Repositories\MenusRepository;
use Illuminate\Http\Request;
use Menu;
use App;

class SiteController extends Controller
{
    //
	protected $p_rep; //portfolio repositories
	protected $s_rep; //slide repositories
	protected $a_rep; //articles repositories
	protected $m_rep; //menu repositories
	protected $b_rep; //biography repositories

    protected $keywords;
    protected $meta_desc;
    protected $title;

	protected $template; //template(шаблон)
	
	protected $vars; //array template
	
	protected $contentRightBar = FALSE; // leftSideBar
	protected $contentLeftBar = FALSE; // RightSideBar
	
	protected $bar = 'no'; //sidebar (default = FALSE)
	
	public function __construct(MenusRepository $m_rep){
		$this->m_rep = $m_rep;
	}
	
	protected function renderOutput(){

	    $menu = $this->getMenu();

	    //dd($menu);

		$navigation = view('pink.navigation')->with('menu',$menu)->render(); // метод render() преобразовывает код в строку и отображает на экран вид меню
		$this->vars = array_add($this->vars,'navigation',$navigation);// добавить в массив (куда,ключ,значение)

        if ($this->contentRightBar){
            $rightBar = view('pink.rightBar')->with('content_rightBar',$this->contentRightBar)->render();
            $this->vars = array_add($this->vars,'rightBar',$rightBar);
        }

        if ($this->contentLeftBar){
            $leftBar = view('pink.leftBar')->with('content_leftBar',$this->contentLeftBar)->render();
            $this->vars = array_add($this->vars,'leftBar',$leftBar);
        }

        $this->vars = array_add($this->vars,'bar',$this->bar);

        $this->vars = array_add($this->vars,'keywords',$this->keywords);
        $this->vars = array_add($this->vars,'meta_desc',$this->meta_desc);
        $this->vars = array_add($this->vars,'title',$this->title);

        $footer = view('pink.footer')->render();
        $this->vars = array_add($this->vars,'footer',$footer);

		return view($this->template)->with($this->vars);// передаем вид template с параметрами $vars
	}

	public function getMenu(){

	    $menu = $this->m_rep->get();
	    /*dd($menu[0]['title']);*/

	    $mBuilder = Menu::make('MyNav', function ($m) use ($menu) {

            $en = \App::isLocale('en');
            $ru = \App::isLocale('ru');

	        if($en){
                foreach ($menu as $item) {
                    $title = $item->title->en;
                        if ($item->parent == 0) {
                            $m->add($title, $item->path)->id($item->id);
                        } else {
                            if ($m->find($item->parent)) {
                                $m->find($item->parent)->add($title, $item->path)->id($item->id);
                            }
                        }
                }
            }elseif($ru){
                foreach ($menu as $item) {
                    $title = $item->title->ru;
                        if ($item->parent == 0) {
                            $m->add($title, $item->path)->id($item->id);
                        } else {
                            if ($m->find($item->parent)) {
                                $m->find($item->parent)->add($title, $item->path)->id($item->id);
                            }
                        }
                }
            }
        });
	    /*dd($mBuilder);*/

	    return $mBuilder;
    }
}
