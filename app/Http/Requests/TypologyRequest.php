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
            "name" => "required|min:3|max:50"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "il nome è obbligatorio",
            "name.min" => "il nome deve contenere :min caratteri",
            "name.max" => "il nome deve contenere :max caratteri"
        ];
    }

}