<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
            'confirm-password' => ['required', 'string', 'max:2555', 'same:password'],
            'email' => [Rule::requiredIf(empty(Auth::user())), 'unique:users', 'email', 'max:255',],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo de nome é obrigatório.',
            'password.required' => 'A senha é obrigatória.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.unique' => "Já existe um usuário com esse e-mail.",
            'confirm-password.same' => "As senhas não conferem, verifique e tente novamente."
        ];
    }
}
