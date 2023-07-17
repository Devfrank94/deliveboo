<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;
use App\Http\Requests\DishRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::paginate(10);
        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishRequest $request)
    {
        $form_data = $request->all();
        $new_dish = new dish();
        $form_data['slug'] = Dish::generateSlug($form_data['name']);

        $form_data['restaurant_id'] = Auth::user()->restaurant->id;

        if (!array_key_exists('visible', $form_data)) {
            $form_data['visible'] = 1;
        }

        if(array_key_exists('image_path', $form_data)){

            // Prima di salvare, salvo nome immagine
            $form_data['image_original_name'] = $request->file('image_path')->getClientOriginalName();

          // Salvo immagine in uploads e con il parametro accanto salvo il precorso
          $form_data['image_path'] = Storage::put('uploads', $form_data['image_path']);
        };

        $new_dish->fill($form_data);
        // dd($form_data);
        $new_dish->save();

        return redirect()->route('admin.dishes.show', $new_dish);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {

        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        if($dish->image_path){
            Storage::disk('public')->delete($dish->image_path);
        }
        $dish->delete();
        return redirect()->route('admin.dishes.index')->with('deleted', "Il piatto $dish->name è stato eliminato correttamente");
    }
}
