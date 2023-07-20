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
    $restaurants = Restaurant::with('typologies', 'dishes')->paginate(5);
    $typologies = Typology::all();
    $dishes = Dish::all();

    return response()->json(compact('restaurants','typologies','dishes'));
  }

  public function getAllTypologies(){
    $typologies = Typology::all();

    return response()->json(compact('typologies'));
  }

  public function getDetailRestaurant($slug){
    $restaurant = Restaurant::where('slug', $slug)->with('typologies', 'dishes')->first();

    return response()->json($restaurant);
  }

  public function getRestaurantByTypology($name){
    $restaurants = Typology::where('name', $name)->with('restaurants')->paginate(5);

    return response()->json($restaurants);
  }

  public function search($tosearch){
    $restaurants = Restaurant::where('name','like',"%$tosearch%")->with('typologies', 'dishes')->paginate(5);

    return response()->json($restaurants);
  }
}
