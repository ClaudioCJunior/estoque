<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use App\Repositories\EstablishmentRepository;
use App\Interfaces\Repositories\IEstablishmentRepository;
use App\Interfaces\Repositories\IEstablishmentUserRepository;
use App\Interfaces\Services\IEstablishmentService;
use App\Interfaces\Services\IEstablishmentUserService;
use App\Models\Establishment;
use App\Repositories\EstablishmentUserRepository;
use App\Services\EstablishmentService;
use App\Services\EstablishmentUserService;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Repositories
        $this->app->singleton(IEstablishmentRepository::class, EstablishmentRepository::class);
        $this->app->singleton(IEstablishmentUserRepository::class, EstablishmentUserRepository::class);


        //Services
        $this->app->singleton(IEstablishmentUserService::class, EstablishmentUserService::class);
        $this->app->singleton(IEstablishmentService::class, EstablishmentService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
    }
}
