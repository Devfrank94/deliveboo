<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')
        ->prefix('restaurants')
        ->group(function(){
            Route::get('/',[RestaurantController::class, 'index']); //tutti i ristoranti
            Route::get('/typologies',[RestaurantController::class, 'getCategories']); // get typology
            Route::get('/restaurant-typology/{id}',[RestaurantController::class, 'getPostsByCategory']); //restaurant typology
            Route::get('/{slug}',[RestaurantController::class, 'getPostDetail']); //get restaurant detail
            Route::get('/search/{tosearch}',[RestaurantController::class, 'search']); //search generica
        });
