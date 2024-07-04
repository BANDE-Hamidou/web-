<?php

namespace App\Observers;

use App\Models\Vehicule;

class VehiculeObserver
{
    /**
     * Handle the Vehicule "created" event.
     */
    public function created(Vehicule $vehicule): void
    {
        //
    }

    /**
     * Handle the Vehicule "updated" event.
     */
    public function updated(Vehicule $vehicule): void
    {
        //
    }

    /**
     * Handle the Vehicule "deleted" event.
     */
    public function deleted(Vehicule $vehicule): void
    {
        //
    }

    /**
     * Handle the Vehicule "restored" event.
     */
    public function restored(Vehicule $vehicule): void
    {
        //
    }

    /**
     * Handle the Vehicule "force deleted" event.
     */
    public function forceDeleted(Vehicule $vehicule): void
    {
        //
    }
}
