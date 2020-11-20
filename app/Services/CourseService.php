<?php
namespace App\Services;

use Illuminate\Support\Facades\Gate;

use App\Models\Course;
use App\Models\StudentCourse;

use App\Http\Requests\CourseRequest;


class CourseService
{
    public function delete($course)
    {
        $response = Gate::inspect('delete', $course);
        if($response->allowed()){
            //deleta a imagem do curso antes de deletar o curso
            //TODO: deletar todos os modulos do curso, mas farei dps de criar o delete de models
            if(file_exists('../public/image/courses/'.$course->image)) {
                unlink('../public/image/courses/'.$course->image);
            }
            $course->delete();
        }
    }

    public function update($course, $request) {
        if($course->update($request->validated())){
           return true;
        }
        return false;
    }

    public function signup($slug, $user)
    {
        $course = Course::select()->where('slug', $slug)->first();
        if($course) {
            $is_student = StudentCourse::select()->where('course_id', $course->id)->where('student_id', $user->id)->first();
            if($is_student) {
                return false;
            }
            $new_course = new StudentCourse();
            $new_course->course_id = $course->id;
            $new_course->student_id = $user->id;
            $new_course->save();

            return $new_course;
        }

        return false;
    }
}