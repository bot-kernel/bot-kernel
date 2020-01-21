<?php

namespace App\Providers;

use App\BotKernel\User\EloquentUserManager;
use App\BotKernel\User\IBotUserManager;
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
        $this->app->bind(IBotUserManager::class, function () {
            return new EloquentUserManager();
        });
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
