<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\StudentCourse;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class Registered
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $parameters = $request->route()->parameters();
        $slug = $parameters['slug'];
        $user = Auth::user();
        $course = Course::where('slug', $slug)->first();
        if(!$course) {
            return redirect('/campus');
        }
        $student_course = StudentCourse::select()->where('course_id', $course->id)->where('student_id', $user->id)->first();
        if(!$student_course) {
            return redirect('/'.$slug);
        }

        return $next($request);
    }
}
