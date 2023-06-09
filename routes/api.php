<?php

use App\Http\Controllers\Main\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(IndexController::class)->group(function () {
    Route::get('countries', 'countries')->name('api.locations.countries');
    Route::get('{country}/states', 'states')->name('api.locations.states');
    Route::get('{state}/cities', 'cities')->name('api.locations.cities');
    Route::get('categories', 'categories')->name('api.categories');
    Route::post('verify-promo-code/key', 'verifyPromoCode')->name('api.verify-promo-code');
});
