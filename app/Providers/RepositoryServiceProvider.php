<?php

namespace App\Providers;

use App\Repositories\ProductRepositoryImpl;
use Illuminate\Support\ServiceProvider;
use TheSource\Domain\Contracts\Repositories\ProductRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductRepository::class, ProductRepositoryImpl::class);
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
