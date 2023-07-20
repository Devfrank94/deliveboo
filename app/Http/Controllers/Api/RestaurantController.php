<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Typology;
use App\Models\Dish;

class RestaurantController extends Controller
{
  public function index(){

    $restaurants = Restaurant::with('typologies', 'dishes')->paginate(1);
    $typologies = Typology::all();
    $dishes = Dish::all();

    return response()->json(compact('restaurants','typologies','dishes'));
}
}
