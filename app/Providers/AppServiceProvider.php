<?php

namespace App\Providers;

use App\Observers\AuditObserver;
use Illuminate\Support\ServiceProvider;
use OwenIt\Auditing\Models\Audit;


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
        Audit::observe(AuditObserver::class);
    }
=======
//    public function boot()
//    {
//        Audit::observe(AuditObserver::class);
//    }
>>>>>>> Stashed changes
}
