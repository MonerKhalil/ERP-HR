<?php

namespace App\Providers;

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
<<<<<<< Updated upstream
    public function boot()
    {
        //
    }
=======
//    public function boot()
//    {
//        Audit::observe(AuditObserver::class);
//    }
>>>>>>> Stashed changes
}
