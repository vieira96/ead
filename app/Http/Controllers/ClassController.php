<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Course;
use App\Models\Module;
use App\Models\Classe;

use App\Services\ClassService;

use App\Http\Requests\ClassRequest;

class ClassController extends Controller
{
    private $class_service;

    public function __construct(ClassService $class_service)
    {
        $this->middleware('administrator');
        $this->class_service = $class_service;
    }

    public function classes(Course $course, Module $module, Request $request)
    {
        $classes = Classe::select()->where('module_id', $module->id)->where('course_id', $course->id)->get();
        return view('dashboard.classes', [
            'user' => Auth::user(),
            'classes' => $classes,
            'course' => $course,
            'module' => $module,
            'success' => $request->session()->get('success')

        ]);
    }

    public function new(Course $course, Module $module, ClassRequest $request)
    {
        $this->class_service->create($course, $module, $request->validated());
        return back()->with(['success' => 'Aula criada com sucesso']);       

    }
}
