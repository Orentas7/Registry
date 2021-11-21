<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Firm;
use App\Observers\FirmObserver;

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
        Firm::observe(FirmObserver::class);
    }
}
