<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Course;
use App\Models\Rating;
use App\Models\StudentCourse;
use App\Models\Module;
use App\Models\Classe;

class CampusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('registered', ['only' => ['courseIndex', 'courseClass']]);
    }

    public function index()
    {
        $user = Auth::user();
        $split_name = explode(' ',$user->name);
        $first_name = $split_name[0];

        $courses = Course::select()->limit(7)->get();

        $student_courses = StudentCourse::select()
            ->leftJoin('courses', 'course_id', '=', 'courses.id' )
            ->where('student_id', $user->id)
        ->get();

        return view('campus', [
            'user' => Auth::user(),
            'first_name' => $first_name,
            'all_courses' => $courses,
            'course_list' => $student_courses
        ]);
    }   

    public function courseIndex($slug, Classe $class = null)
    {
        $user = Auth::user();
        $course = Course::select()->where('slug', $slug)->first();
        $modules = Module::select()->where('course_id', $course->id)->get();    
        foreach($modules as $moduleKey => $moduleData) {
            //crio a chave das aulas e adiciono no modulo
            $modules[$moduleKey]['classes'] = Classe::select()->where('module_id', $moduleData['id'])->get();
        }

        if($class) {
            $class = Classe::select()->where('id', $class->id)->where('course_id', $course->id)->first();
            if(!$class) {
                return redirect('campus');
            }
        } else {
            $class = Classe::where('course_id', $course->id)->first();
        }
        

        return view('campus-course', [
            'user' => $user,
            'modules' => $modules,
            'course' => $course,
            'class' => $class
        ]);
    }

}
