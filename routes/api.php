<?php

use App\Http\Controllers\Api\OrderController;
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
            Route::get('/',[RestaurantController::class, 'index']); //prende tutti i ristoranti con tutte le sue relezioni (piatti e tipologie)
            Route::get('/typologies',[RestaurantController::class, 'getAllTypologies']); // prende tutte le tipologie
            Route::get('/restaurant-typology/{name}',[RestaurantController::class, 'getRestaurantByTypology']); //prende i ristoranti con quella tipologia
            Route::get('/{slug}',[RestaurantController::class, 'getDetailRestaurant']); //prende il dettaglio del singolo ristorante con tutte le sue relazioni (piatti e tipologie)
            Route::get('/search/{tosearch}',[RestaurantController::class, 'search']); //search generica
        });

Route::namespace('Api')
        ->prefix('orders')
        ->group(function(){
          Route::post('/check-out', [OrderController::class, 'getCart']);
        });
