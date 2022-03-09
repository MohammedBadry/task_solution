<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repos\Accounts\Register\RegisterInterface;
use App\Http\Repos\Accounts\Register\RegisterRepo;

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
            RegisterInterface::class, RegisterRepo::class
        );
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
