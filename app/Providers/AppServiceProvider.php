<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //user.php
        $this->app->bind(
            'App\Http\User\Interfaces\UserRepositoryIface',
            'App\Http\User\Repositories\UserRepository');

        $this->app->bind(
            'App\Http\User\Interfaces\UserServiceIface',
            'App\Http\User\Service\UserService');

        //userAPI
        $this->app->bind(
            'App\Http\UserAPI\Interfaces\UserAPIServiceIface',
            'App\Http\UserAPI\Service\UserAPIService');


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
