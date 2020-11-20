<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Course;



class HomeController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $courses = Course::all();

        return view('home', [
            'user' => $user,
            'course_list' => $courses
        ]);
    }
}
