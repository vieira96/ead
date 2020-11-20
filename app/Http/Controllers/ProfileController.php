<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        return view('profile', [
            'user' => $request->user(),
            'success' => $request->session()->get('success')
        ]);
    }
}
