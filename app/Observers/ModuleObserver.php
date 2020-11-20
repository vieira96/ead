<?php

namespace App\Observers;

use App\Models\Module;

class ModuleObserver
{
    /**
     * Handle the Module "created" event.
     *
     * @param  \App\Models\Module  $module
     * @return void
     */
    public function creating()
    {
    }


    /**
     * Handle the Module "created" event.
     *
     * @param  \App\Models\Module  $module
     * @return void
     */
    public function created(Module $module)
    {
        //
    }

    /**
     * Handle the Module "updated" event.
     *
     * @param  \App\Models\Module  $module
     * @return void
     */
    public function updated(Module $module)
    {
        //
    }

    /**
     * Handle the Module "deleted" event.
     *
     * @param  \App\Models\Module  $module
     * @return void
     */
    public function deleted(Module $module)
    {
        //
    }

    /**
     * Handle the Module "restored" event.
     *
     * @param  \App\Models\Module  $module
     * @return void
     */
    public function restored(Module $module)
    {
        //
    }

    /**
     * Handle the Module "force deleted" event.
     *
     * @param  \App\Models\Module  $module
     * @return void
     */
    public function forceDeleted(Module $module)
    {
        //
    }
}
