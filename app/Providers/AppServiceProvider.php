<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider

{
    protected $namespace ="App\\Http\\Controllers";
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       $this-> mapApiRoutes();
    }
    protected function mapApiRoutes()
    {
        Route::middleware('api')
            ->prefix("api")
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

}
