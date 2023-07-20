<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypologyRequest;
use App\Models\Restaurant;
use App\Models\Typology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Restaurant::where('user_id', '=', Auth::user()->id)->first();

        return view('admin.restaurant.index', compact('restaurant'));
    }

    public function gallery(Request $request)
    {
      $form_data = $request->all();

      if(array_key_exists('image', $form_data)){

        $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();

        $form_data['image_path'] = Storage::put('uploads', $form_data['image']);
      }


      $restaurant = Restaurant::where('user_id', '=', Auth::user()->id)->first();

      $restaurant->image_path = $form_data['image_path'];
      $restaurant->image_original_name = $form_data['image_original_name'];

      $restaurant->update();

      return view('admin.restaurant.index', compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
      $typologies = Typology::all();
      return view('admin.restaurant.edit', compact('restaurant', 'typologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypologyRequest $request, Restaurant $restaurant)
    {
      $form_data = $request->all();

      if($restaurant->name !== $form_data['name']){
        $form_data['slug']  = Restaurant::generateSlug($form_data['name']);
      }else{
        $form_data['slug']  = $restaurant->slug;
      }

      $restaurant->name = $form_data['name'];

      if(array_key_exists('image', $form_data)){

        if($restaurant->image_path){
          Storage::disk('public')->delete($restaurant->image_path);
        }

        $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();

        $form_data['image_path'] = Storage::put('uploads', $form_data['image']);
      }

      if(array_key_exists('typologies', $form_data)){
        $restaurant->typologies()->sync($form_data['typologies']);
      }else{
        $restaurant->typologies()->detach();
      }

      if (array_key_exists('visible', $form_data)) {
        $form_data['visible'] = 1;
      }else{
      $form_data['visible'] = 0;
      }

      $restaurant->update($form_data);

      return redirect()->route('admin.restaurant.index', $restaurant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
