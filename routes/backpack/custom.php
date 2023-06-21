<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');

    Route::crud('good', 'GoodCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('brand', 'BrandCrudController');
    Route::crud('order', 'OrderCrudController');
    Route::crud('property', 'PropertyCrudController');
    Route::crud('good-property', 'GoodPropertyCrudController');
    Route::crud('tag', 'TagCrudController');
    Route::crud('country', 'CountryCrudController');
    Route::crud('user-address', 'UserAddressCrudController');
    Route::crud('good-tag', 'GoodTagCrudController');
    Route::crud('state', 'StateCrudController');
    Route::crud('city', 'CityCrudController');
}); // this should be the absolute last line of this file