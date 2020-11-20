<?php

namespace App\Observers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

use Intervention\Image\ImageManagerStatic as Image;


class CourseObserver
{
    /**
     * Handle the Course "saving" event.
     *
     * @param  \App\Course  $course
     * @return void
     */
    public function creating(Course $course)
    {
        $course->owner_id = Auth::user()->id;
        $course->slug = Str::slug($course->name);
        
        $img = Image::make($course->image->path())->resize(500, null, function($constraint){
            $constraint->aspectRatio();
        });
        $mime = explode('/', $img->mime());
        $mime = '.'.$mime[1];
        $file_name = rand(0, 99999).time().rand(0,99999).$mime;

        // $file_name = rand(0, 9999)
        $img->save('../public/image/courses/'.$file_name, 80);
        // imagem salva com um nome aleatorio na pasta
        $course->image = $file_name;
    }

    /**
     * Handle the Course "created" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function created(Course $course)
    {
    
    }

    public function updating(Course $course)
    {
        $file_name = $course->getOriginal('image');
        
        if(is_file($course->image)) {
            //lidando com a imagem
            //redimensiona a imagem
            $img = Image::make($course->image->path())->resize(500, null, function($constraint){
                $constraint->aspectRatio();
            });

            $mime = explode('/', $img->mime());
            $mime = '.'.$mime[1];
            
            $file_name = rand(0, 99999).time().rand(0,99999).$mime;
            $img->save('../public/image/courses/'.$file_name, 80);
            // imagem salva com um nome aleatorio na pasta
            if(file_exists('../public/image/courses/'.$course->getOriginal('image'))) {
                unlink('../public/image/courses/'.$course->getOriginal('image'));
            }
        }

        $course->name = $course->name;
        $course->description = $course->description;
        $course->slug = Str::slug($course->name);
        $course->image = $file_name;
    }
        
            
    /**
     * Handle the Course "updated" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function updated(Course $course)
    {
        //
    }

    /**
     * Handle the Course "deleted" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function deleted(Course $course)
    {
        //
    }

    /**
     * Handle the Course "restored" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function restored(Course $course)
    {
        //
    }

    /**
     * Handle the Course "force deleted" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function forceDeleted(Course $course)
    {
        //
    }
}
