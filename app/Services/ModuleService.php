<?php

namespace App\Services;

use App\Http\Requests\ModuleRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

use App\Models\Course;
use App\Models\Module;


class ModuleService {

    public function new(ModuleRequest $request, Course $course)
    {
        $validated = $request->validated();
        $new_module = new Module();
        $new_module->name = $request->input('name');
        $new_module->course_id = $course->id;
        $new_module->save();
    }

    public function delete(Module $module, Course $course)
    {
        $response = Gate::inspect('delete', [$module, $course]);
        if($response->allowed()){
            $module->delete();
        }
    }

    public function update(Module $module, array $data)
    {
        $module->name = $data['name'];
        $module->save();
        return true;
    }
}
