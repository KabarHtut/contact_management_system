<?php

namespace App\Providers;

use App\Services\ContactService;
use Illuminate\Support\ServiceProvider;
use App\ServiceInterfaces\ContactServiceInterface;
use App\ServiceInterfaces\GroupServiceInterface;
use App\Services\GroupService;

class ServiceInterfaceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ContactServiceInterface::class,
            ContactService::class
        );
        $this->app->bind(
            GroupServiceInterface::class,
            GroupService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}