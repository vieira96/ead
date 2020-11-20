<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['image', 'name', 'description'];

    public function classes()
    {
        return $this->hasMany('App\Models\Classe', 'course_id');
    }

}
