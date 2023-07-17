<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:255',
            'image_path' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'price' => 'required|numeric',
            'vote' => 'required',
        ];
    }

    public function messages()
    {
        return[
            // Campi richiesti
            'name.required' => 'Il nome è un campo obbligatorio',
            'description.required' => 'La Descrizione è un campo obbligatorio',
            'image_path.required' => 'L\'immagine è un campo obbligatorio',
            'price.required' => 'Il Prezzo è un campo obbligatorio',
            'vote.required' => 'Il Voto è un campo obbligatorio',


            // Caratteri massimi

            'name.max' => 'Il Nome può contenere al massimo :max caratteri',


            // Caratteri Minimi o condizioni varie

            'name.min' => 'Il Nome può contenere minimo :min caratteri',
        ];
    }
}
