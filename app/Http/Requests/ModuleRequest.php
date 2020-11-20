<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Modules;

class ModuleRequest extends FormRequest
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
            'name' => [Rule::unique('modules')->where(function($query){
                $id = $this->route('course.id');
                return $query->where('course_id', $id);
            }), 'required', 'max:255']
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => "Já existe um modulo com esse nome.",
            'name.required' => "O nome do módulo é obrigatório.",
            'name.max' => "Ultrapassou o limite de 255 caracteres.",            
        ];
    }
}
