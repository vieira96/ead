<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use App\Models\User;

class UserController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('guest', ['only' => ['register']]);
    }

    public function register()
    {
        return view('register');
    }

    public function registerAction(UserRequest $request)
    {
        
        User::create($request->validated());
        //toda a logica esta no observer de user
        return redirect('/');
    }

    public function editAction(UserRequest $request)
    {
        $user = $request->user();
        if($user->update($request->validated())){
            $request->session()->flash('success', 'dados atualizados com sucesso');
        }
        return redirect('profile');
    }
}
