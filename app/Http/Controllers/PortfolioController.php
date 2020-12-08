<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PortfoliosRepository;

class PortfolioController extends SiteController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct( PortfoliosRepository $p_rep){

        parent::__construct(new\App\Repositories\MenusRepository(new \App\Models\Menu));

        $this->p_rep = $p_rep;

        $this->template = 'pink.portfolios'; //предопределение шаблона сайта
    }



    public function index()
    {
        $portfolios = $this->getPortfolios();

        $content = view('pink.portfolios_content')->with('portfolios',$portfolios)->render();
        $this->vars = array_add($this->vars,'content',$content);



        return $this->renderOutput();
    }

    public function getPortfolios($take = False,$paginate = TRUE){
        $portfolios = $this->p_rep->get('*',$take,$paginate);
        if($portfolios){
            $portfolios->load('filter');
        }
        return $portfolios;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function show($alias)
    {
        $portfolio = $this->p_rep->one($alias);// one($alias) - выбрать одну запись по $alias

        if($portfolio){
            $portfolio->title = json_decode($portfolio->title);
        }
        if($portfolio){
            $portfolio->director = json_decode($portfolio->director);
        }
        if($portfolio){
            $portfolio->customer = json_decode($portfolio->customer);
        }
        if($portfolio){
            $portfolio->text = json_decode($portfolio->text);
        }
        //dd($portfolio);

        $other_portfolios = 8;
        $portfolios = $this->getPortfolios($other_portfolios,FALSE);
        //dd($portfolios);

        $content = view('pink.portfolio_content')->with(['portfolio' => $portfolio,'portfolios' => $portfolios])->render();
        $this->vars = array_add($this->vars,'content',$content);
        //dd($portfolio);

        return $this->renderOutput();
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
