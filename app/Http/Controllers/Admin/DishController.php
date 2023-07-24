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
        $dishes = Dish::where('restaurant_id', '=', Auth::user()->restaurant->id)->paginate(10);
        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (!Auth::check()) {
        // L'utente non è autenticato, quindi lo reindirizzo alla pagina di login
        return redirect()->route('login');
    }


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

        if (array_key_exists('visible', $form_data)) {
            $form_data['visible'] = 1;
        }else{
          $form_data['visible'] = 0;
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

      if (!$this->canEdit($dish)) {
        // Puoi fare un reindirizzamento a una pagina di errore o mostrare un messaggio di errore.
        return redirect()->route('admin.dishes.index')->with('error', 'Non hai il permesso di modificare il piatto di un altro ristorante.');
    }
        return view('admin.dishes.edit', compact('dish'));
    }

    private function canEdit(Dish $dish)
    {
        return Auth::user()->restaurant->id === $dish->restaurant_id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DishRequest $request, Dish $dish)
    {
      $form_data = $request->all();


      if($dish->name !== $form_data['name']){
        $form_data['slug'] = Dish::generateSlug($form_data['name']);
      }else{
        // altrimenti salvo il slug il vecchio slug
        $form_data['slug']  = $dish->slug;
      }

      if (array_key_exists('visible', $form_data)) {
        $form_data['visible'] = 1;
      }else{
      $form_data['visible'] = 0;
      }

      if (array_key_exists('image_path', $form_data)) {
        // Verifica se esiste un'immagine precedente e, se presente, eliminala dallo storage
        if ($dish->image_path) {
          Storage::disk('public')->delete($dish->image_path);
        }

        // Prima di salvare, salva il nome originale dell'immagine
        $form_data['image_original_name'] = $request->file('image_path')->getClientOriginalName();

        // Salva l'immagine nella cartella "uploads" e memorizza il percorso
        $form_data['image_path'] = Storage::put('uploads', $request->file('image_path'));
      }


      $dish->update($form_data);

      return redirect()->route('admin.dishes.show', compact('dish'));
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
