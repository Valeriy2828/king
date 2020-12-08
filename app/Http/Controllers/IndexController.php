<?php

namespace App\Http\Controllers;

use App\Repositories\ArticlesRepository;
use App\Repositories\QuotesRepository;
use App\Repositories\SlidersRepository;
use App\Repositories\PortfoliosRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class IndexController extends SiteController
{
	public function __construct(SlidersRepository $s_rep, PortfoliosRepository $p_rep, ArticlesRepository $a_rep, QuotesRepository $q_rep){
		
		parent::__construct(new\App\Repositories\MenusRepository(new \App\Models\Menu));

		$this->s_rep = $s_rep;
		$this->p_rep = $p_rep;
		$this->a_rep = $a_rep;
		$this->q_rep = $q_rep;

		$this->bar = 'right';		
		$this->template = 'pink.index'; //предопределение шаблона сайта
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = $this->getPortfolio();
        //dd($portfolio);
        $content = view('pink.content')->with('portfolios', $portfolios)->render();
        $this->vars = array_add($this->vars,'content',$content);

        $sliderItems = $this->getSliders();
       // dd($sliderItems);
        $sliders = view('pink.slider')->with('sliders',$sliderItems)->render();
        $this->vars = array_add($this->vars,'sliders',$sliders);

        $this->keywords = 'Home Page';
        $this->meta_desc = 'Home Page';
        $this->title = 'Home Page';

        $articles = $this->getArticles();
        $quotes = $this->getQuotes();
        $this->contentRightBar = view('pink.indexBar')->with('articles',$articles)->with('quotes',$quotes)->render();
        //dd($quotes);
        //dd($articles);

        /*$quotesItems = $this->getQuotes();
        $quotes = view('pink.indexBar')->with('quotes',$quotesItems)->render();
        $this->vars = array_add($this->vars,'quotes',$quotes);
        //dd($quotes);*/

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function getPortfolio(){
         $home_port_count = 5;
        $portfolio = $this->p_rep->get('*', $home_port_count);
       // $c = Config::get('settings.home_port_count');
        //dd($c);

        return $portfolio;
    }

    protected function getArticles(){
		$home_alias_count = 3;
        $articles = $this->a_rep->get(['title','created_at','img','alias','slug','year'], $home_alias_count);

        return $articles;
    }

    public function getSliders(){
            $sliders = $this->s_rep->get();
            if($sliders->isEmpty()){
                return FALSE;
            }


        /*if($sliders){
            $sliders->title = json_decode($sliders->title);
            //$article->test = json_decode($article->test);
        }*/

        //dd($sliders->title->en);

        $sliders->transform(function ($item,$key){
           $item->img = Config::get('settings.slider_path').'/'.$item->img;
           return $item;
        });

        //dd($sliders);
        return $sliders;
    }

    protected function getQuotes(){
        $quote = $this->q_rep->get('text');
        return $quote;
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
