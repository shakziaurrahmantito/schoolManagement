<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\payment\mypayment;

class ourprovider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind("pay", mypayment::class);
    }
}
