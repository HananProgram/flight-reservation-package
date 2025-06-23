<?php

namespace Hanan\FlightReservation;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Filament\Facades\Filament;

class FlightReservationServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-flight-reservation')
            ->hasConfigFile('flight-reservation')
            ->hasViews()
            ->hasMigrations([
                'create_flights_table',
            ])
            ->hasRoute('web')
    ->hasViews()
            ->hasRoute('api');



            
    }

 public function packageBooted(): void
{
    $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

      if (app()->runningInConsole() && app()->environment('testing')) {
        return;
    }

    Filament::registerPages([
        \Hanan\FlightReservation\Filament\Pages\FlightDashboard::class,
    ]);
}

    public function packageRegistered(): void
    {
      
    }
   
}