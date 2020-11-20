<?php 

namespace App\Services;

use App\Models\Course;
use App\Models\Module;
use App\Models\Classe;

class ClassService {

    public function create(Course $course, Module $module, array $data)
    {
        $new_class = new Classe();
        $new_class->name = $data['name'];
        $new_class->video = $data['video'];
        $new_class->module_id = $module->id;
        $new_class->course_id = $course->id;
        $new_class->save();
    }

}