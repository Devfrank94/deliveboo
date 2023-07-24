<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TypologyController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Admin\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [PageController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])
->name('admin.')
->prefix('admin')
->group( function() {
  Route::get('/', [DashboardController::class, 'index'])->name('home');
  Route::resource('typologies', TypologyController::class);
  Route::resource('dishes', DishController::class);
  Route::resource('restaurant', RestaurantController::class);
  Route::put('/gallery', [RestaurantController::class, 'gallery'])->name('gallery');
  Route::resource('orders', OrderController::class);
  Route::get('/order-statistics', [OrderController::class, 'orderStatistics'])->name('statistics');;
});

//   Route::get('/statistics', function () {
//     return view('admin.statistics');
// });

require __DIR__.'/auth.php';


Route::get('{any?}',function(){
    return view('guest.home');
})->where('any','.*')->name('home');
