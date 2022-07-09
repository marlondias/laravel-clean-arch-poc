<?php

namespace App\Providers;

use App\Repositories\ProductRepositoryImpl;
use App\Repositories\UserRepositoryImpl;
use Illuminate\Support\ServiceProvider;
use TheSource\Domain\Contracts\Repositories\ProductRepository;
use TheSource\Domain\Contracts\Repositories\User\UserCommandsRepository;
use TheSource\Domain\Contracts\Repositories\User\UserQueriesRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // TODO: create and inject new repositories
        $this->app->bind(UserCommandsRepository::class, UserRepositoryImpl::class);
        $this->app->bind(UserQueriesRepository::class, UserRepositoryImpl::class);
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
