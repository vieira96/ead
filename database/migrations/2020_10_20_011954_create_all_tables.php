<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('owner_id');
            $table->string('name')->collation('utf8_general_ci');
            $table->string('slug')->collation('utf8_general_ci');
            $table->string('image')->collation('utf8_general_ci');
            $table->text('description')->nullable()->collation('utf8_general_ci');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name')->collation('utf8_general_ci');
            $table->string('email')->collation('utf8_general_ci');
            $table->string('password')->collation('utf8_general_ci');
            $table->tinyInteger('office');	
        });

        Schema::create('student_course', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('course_id');
            $table->integer('student_id');
        });

        Schema::create('modules', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('course_id');
            $table->string('name')->collation('utf8_general_ci');
        });

        Schema::create('classes', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('module_id');
            $table->integer('course_id');
            $table->string('name');
            $table->string('video');
        });

        Schema::create('ratings', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('course_id');
            $table->integer('stars');
        });
        
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_tables');
    }
}
