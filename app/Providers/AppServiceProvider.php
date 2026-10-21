<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

class AppServiceProvider extends ServiceProvider
{
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
        // Para compatibilidad con MySQL (índices largos)
        Schema::defaultStringLength(191);

        // Para mostrar fechas como "hace 3 días" en español, si usas Carbon
        Carbon::setLocale(config('app.locale', 'es'));
    }
}
