<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        //
    ];


    public function boot(): void
    {
/*        if (!$this->app->routesAreCached()){
            Passport::routes();
        }*/
    }
}
