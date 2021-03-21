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
        //User
        $this->app->bind(
            'App\Http\User\Interfaces\UserRepositoryIface',
            'App\Http\User\Repositories\UserRepository');

        $this->app->bind(
            'App\Http\User\Interfaces\UserServiceIface',
            'App\Http\User\Repositories\UserService');

        //userAPI
        $this->app->bind(
            'App\Http\UserAPI\Interfaces\UserAPIServiceIface',
            'App\Http\UserAPI\Repositories\UserAPIService');


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
