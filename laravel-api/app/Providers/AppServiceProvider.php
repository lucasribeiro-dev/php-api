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
        $this->app->bind(
            \App\Repositories\Contracts\UserRepositoryInterface::class, 
            \App\Repositories\UserRepository::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\CityRepositoryInterface::class, 
            \App\Repositories\CityRepository::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\StateRepositoryInterface::class, 
            \App\Repositories\StateRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\AddressRepositoryInterface::class, 
            \App\Repositories\AddressRepository::class
        );
    }
}
