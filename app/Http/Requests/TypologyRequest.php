<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypologyRequest extends FormRequest
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
            "name" => "required|min:3|max:50",
            "address" => "required|min:3|max:100",
            "p_iva" => "required|min:11|max:100",
            "typologies" => "required",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Il nome è obbligatorio",
            "name.min" => "Il nome deve contenere :min caratteri",
            "name.max" => "Il nome deve contenere :max caratteri",
            "address.required" => "L'indirizzo è obbligatorio",
            "address.min" => "L'indirizzo contenere :min caratteri",
            "address.max" => "L'indirizzo contenere :max caratteri",
            "p_iva.required" => "La partita Iva è obbligatoria",
            "p_iva.min" => "La partita Iva contenere :min caratteri",
            "p_iva.max" => "La partita Iva contenere :max caratteri",
            "typologies.required" => "Devi selezionare almeno una tipologia"
        ];
    }

}
