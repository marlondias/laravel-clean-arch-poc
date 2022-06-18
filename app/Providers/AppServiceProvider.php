<?php

namespace App\Providers;

use App\Services\StringHashingServiceImpl;
use Illuminate\Support\ServiceProvider;
use TheSource\Domain\Contracts\Services\StringHashingService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(StringHashingService::class, StringHashingServiceImpl::class);
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
