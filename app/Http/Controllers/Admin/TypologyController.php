<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Typology;
use Illuminate\Http\Request;
use App\Http\Requests\TypologyRequest;

class TypologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $typologies = Typology::all();
      return view('admin.typologies.index', compact('typologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Typology $typologies)
    {
        return view('admin.typologies.create', compact('typologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypologyRequest $request)
    {
        $form_data = $request->all();

        $form_data['slug'] = Typology::generateSlug($form_data['name']);

        return redirect()->route('admin.typologies.index');

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
    public function edit(Typology $typology)
    {
        return view('admin.typologies.edit', compact('typology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypologyRequest $request,Typology $typology)
    {
        $form_data=$request->all();

        $typology->update($form_data);
        $form_data['slug'] = Typology::generateSlug($form_data['name']);

        return redirect()->route('admin.typologies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Typology $typology)
    {
        $typology->delete();
        return redirect()->route('admin.typologies.index')->with('deleted', " $typology->name è stato eliminato correttamente");
    }
}