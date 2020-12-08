<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\CommentsRepository;
use Illuminate\Http\Request;
use App\Repositories\ArticlesRepository;
use App\Repositories\PortfoliosRepository;
use App;

class ArticlesController extends SiteController
{
    public function __construct( PortfoliosRepository $p_rep, ArticlesRepository $a_rep, CommentsRepository $c_rep){

        parent::__construct(new\App\Repositories\MenusRepository(new \App\Models\Menu));

        $this->p_rep = $p_rep;
        $this->a_rep = $a_rep;
        $this->c_rep = $c_rep;

        $this->bar = 'right';
        $this->template = 'pink.articles'; //предопределение шаблона сайта
    }

    public function index($cat_alias = FALSE)
    {
        $articles = $this->getArticles($cat_alias);

        $content = view('pink.articles_content')->with('articles',$articles)->render();
        $this->vars = array_add($this->vars,'content',$content);

        $recent_comments = 3;
        $comments =$this->getComments($recent_comments);


        $recent_portfolios = 3;
        $portfolios = $this->getPortfolios($recent_portfolios);
        //dd($portfolios);
        $this->contentRightBar = view('pink.articleBar')->with(['comments' => $comments, 'portfolios' => $portfolios]);

        return $this->renderOutput();
    }

    public function getComments($take){
        $comments = $this->c_rep->get(['comments','user_id','article_id'],$take);
        if($comments){
            $comments->load('article','user');
        }
        return $comments;
    }

    public function getPortfolios($take){
        $portfolios = $this->p_rep->get(['title','alias','text','filter_alias','img','customer','slug'],$take);
        return $portfolios;
    }

    public  function getArticles($alias = FALSE){

        $where = FALSE;

        if($alias){
            $id = Category::select('id')->where('alias',$alias)->first()->id;
            //dd($id);]
            $where = ['category_id',$id];
        }
        $articles = $this->a_rep->get(['id','title','alias','created_at','desc','img','year','user_id','category_id','slug','text','rating'],FALSE,TRUE,$where);
        //dd($articles);

        if($articles){
            $articles->load('user','category','comments');
        }

        //dd($articles);
        return $articles;
    }

    public function show($alias = FALSE)
    {
        $article = $this->a_rep->one($alias,['comments' => TRUE]);
        //dd($article);
       /* $en = App::isLocale('en');
        $ru = App::isLocale('ru');
        $lang = [];
        array_push($lang, App::isLocale('en'), App::isLocale('ru'));
        dd($lang);*/
        if($article){
           $article->title = json_decode($article->title);
           $article->text = json_decode($article->text);
           $article->img = json_decode($article->img);
           $article->year = json_decode($article->year);
        }
        $content = view('pink.article_content')->with('article',$article)->render();
        $this->vars = array_add($this->vars,'content',$content);

        $recent_comments = 3;
        $comments =$this->getComments($recent_comments);

        $recent_portfolios = 3;
        $portfolios = $this->getPortfolios($recent_portfolios);
        //dd($portfolios);
        $this->contentRightBar = view('pink.articleBar')->with(['comments' => $comments, 'portfolios' => $portfolios]);

        return $this->renderOutput();
    }
}
