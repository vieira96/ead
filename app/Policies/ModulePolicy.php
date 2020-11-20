<?php

namespace App\Policies;

use App\Models\Module;
use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModulePolicy
{
    
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
        dd('ok');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Module  $module
     * @param  \App\Models\Course  $course
     * @return mixed
     */
    public function view(User $user, Module $module)
    {
        dd('ok view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        dd('ok');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $course
     * @param  \App\Models\Module  $module
     * @return mixed
     */
    public function update(User $user, Module $module, Course $course)
    {
        return $user->office > 1 || $course->owner_id === $user->id; 
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Module  $module
     * @return mixed
     */
    public function delete(User $user, Module $module, Course $course)
    {
        return $module->course_id == $course->id && $course->owner_id == $user->id || $user->office > 1;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Module  $module
     * @return mixed
     */
    public function restore(User $user, Module $module)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Module  $module
     * @return mixed
     */
    public function forceDelete(User $user, Module $module)
    {
        dd('ok');
        //
    }
}
