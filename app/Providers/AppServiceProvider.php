<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;

use App\Models\Course;
use App\Observers\CourseObserver;

use App\Models\Module;
use App\Observers\ModuleObserver;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        User::observe(UserObserver::class);
        Course::observe(CourseObserver::class);
        Module::observe(ModuleObserver::class);
    }
}
