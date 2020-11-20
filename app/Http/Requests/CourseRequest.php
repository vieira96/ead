<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseRequest extends FormRequest
{
    // /**
    //  * Determine if the user is authorized to make this request.
    //  *
    //  * @return bool
    //  */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('course.id');
        return [
            'image' => [Rule::requiredIf(function(){
                return FormRequest::getPathInfo() === "/dashboard/new";
            }),'max:1000', 'mimes:jpeg,jpg,png'],
            'name' => ['required', Rule::unique('courses')->ignore($id), 'max:255'],
            'description' => ['required', 'max:255']
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Imagem é obrigatoria.',
            'image.max' => 'A imagem ultrapassou o tamanho limite.',
            'name.required' => 'O nome do curso é obrigatorio.',
            'name.unique' => 'Esse nome já está em uso.',
            'description.required' => 'O campo de descrição é obrigatório.',
            'description.max' => 'A descrição é ultrapassou o limite de 255 caracteres.',
            'image.mimes' => 'Os tipos de imagens suportadas são jpg, jpeg, png.'
        ];
    }

    
}
