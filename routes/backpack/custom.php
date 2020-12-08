<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin'), 'checkIfAdmin'],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('menu', 'MenuCrudController');
    Route::crud('user', 'UserCrudController');
    Route::crud('slider', 'SliderCrudController');
    Route::crud('portfolio', 'PortfolioCrudController');
    Route::crud('filter', 'FilterCrudController');
    Route::crud('article', 'ArticleCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('comment', 'CommentCrudController');
    Route::crud('quote', 'QuoteCrudController');
    Route::crud('biography', 'BiographyCrudController');
}); // this should be the absolute last line of this file