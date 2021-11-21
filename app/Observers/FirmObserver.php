<?php

namespace App\Observers;

use App\Models\Firm;
use App\Observers\FirmObserver;
use App\Notifications\RegisterEmailNotification;

class FirmObserver
{
    
    /**
     * Handle the Firm "created" event.
     *
     * @param  \App\Models\Firm  $firm
     * @return void
     */
    public function created(Firm $firm)
    {
        $firm->notify(new RegisterEmailNotification());
    }

    /**
     * Handle the Firm "updated" event.
     *
     * @param  \App\Models\Firm  $firm
     * @return void
     */
    public function updated(Firm $firm)
    {
        //
    }

    /**
     * Handle the Firm "deleted" event.
     *
     * @param  \App\Models\Firm  $firm
     * @return void
     */
    public function deleted(Firm $firm)
    {
        //
    }

    /**
     * Handle the Firm "restored" event.
     *
     * @param  \App\Models\Firm  $firm
     * @return void
     */
    public function restored(Firm $firm)
    {
        //
    }

    /**
     * Handle the Firm "force deleted" event.
     *
     * @param  \App\Models\Firm  $firm
     * @return void
     */
    public function forceDeleted(Firm $firm)
    {
        //
    }
}
