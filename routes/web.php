<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|Route::get('/', function () {
    return view('welcome');
});
	Route::get('/home', 'HomeController@index')->name('home');
	//Route::auth();
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::get('/logout', function(){
    \Auth::logout();
    return redirect('/');
});

Route::resource('/','IndexController',[
										'only' => ['index'],
										'names' => [
												'index'=>'home'
											]
										]);

Route::resource('portfolios','PortfolioController',[
                                                        'parameters' => [
                                                               'portfolios' => 'alias'
                                                            ]
                                                        ]);

Route::resource('articles','ArticlesController',[
                                                'parameters' => [
                                                    'articles' => 'alias'
                                                ]
                                            ]);

Route::get('articles/cat/{cat_alias?}',['uses' => 'ArticlesController@index','as' => 'articlesCat'])->where('cat_alias','[\w-]+');

Route::resource('comment','CommentController',['only' => ['store']]);

Route::get('/biography',['uses' => 'BiographyController@index','as' => 'biography']);


Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);

    return redirect()->back();
})->name('locale');

