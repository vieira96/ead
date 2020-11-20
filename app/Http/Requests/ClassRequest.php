<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'video' => ['required', 'max:255', 'url']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "O nome da aula é obrigatória.",
            'name.max' => "O nome ultrapassou o limite de 255 caracteres.",
            'video.required' => "O video é obrigatório.",
            'video.max' => "O video ultrappasou o limite de 255 caracteres",
            'video.url' => "Informe uma url válida"            
        ];
    }
}
