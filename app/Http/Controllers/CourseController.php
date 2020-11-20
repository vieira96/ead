<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use App\Http\Requests\CourseRequest;

use App\Models\Rating;
use App\Models\Course;
use App\Models\StudentCourse;

use App\Services\CourseService;

class CourseController extends Controller
{

    protected $course_service;

    public function __construct(CourseService $course_service)
    {
        $this->course_service = $course_service;
        $this->middleware('auth', [
            'except' => 'courseInfo'
        ]);

        $this->middleware('administrator', [
            'except' => ['courseInfo', 'subscribe']
        ]);

    }

    public function courseInfo($slug)
    {
        $is_student = false;
        $user = Auth::user();
        $course = Course::select()->where('slug', $slug)->first();
        if(!$course){
            return redirect('/');
        }
        
        if($user){
            $is_student = StudentCourse::select()->where('course_id', $course->id)->where('student_id', $user->id)->first();
            if($is_student) {
                $is_student = true;
            }
        }

        //pega as avaliações do curso
        $ratings = Rating::select()->where('course_id', $course->id)->get();

        //pega a media de avaliações para mostrar nas estrelas
        $rating_average = Rating::select()->where('course_id', $course->id)->avg('stars');
        $rating_average = round($rating_average);

        return view('course', [
            'user' => $user,
            'is_student' => $is_student,
            'course' => $course,
            'ratings' => $ratings,
            'rating_average' => $rating_average
        ]);
    }

    public function subscribe($slug)
    {
        $user = Auth::user();
        if($this->course_service->signup($slug, $user)){
            return redirect('campus/'.$slug);
        }
        return back();
    }

    public function courses()
    {
        return view('dashboard.courses', [
            'courses' => Course::all(),
            'user' => Auth::user()
        ]);
    }

    public function newCourse()
    {
        return view('dashboard.new-course', [
            'user' => Auth::user()
        ]);
    }

    public function newCourseAction(CourseRequest $request)
    {
        $course = Course::create($request->validated());
        //toda a logica está no CourseObserver creating()
        return redirect('/dashboard/courses');
    }

    public function editCourse(Course $course, Request $request)
    {
        $response = Gate::inspect('update', $course);
        if($response->allowed()){
            return view('dashboard.edit-course', [
                'course' => $course,
                'user' => $request->user(),
                'success' => $request->session()->get('success')
            ]);
        }
        return redirect('/dashboard/courses');
    }

    public function editCourseAction(Course $course, CourseRequest $request)
    {   
        if($this->course_service->update($course, $request)){
            return back()->with(['success' => 'Curso atualizado com sucesso']);
        }
        return back();
    }

    public function deleteCourse(Course $course)
    {
        $this->course_service->delete($course);
        return redirect('/dashboard/courses');
    }
}