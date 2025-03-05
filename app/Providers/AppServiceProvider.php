<?php

namespace App\Providers;

use App\Interfaces\AdminProfileRepositoryInterface;
use App\Interfaces\AdminRepositoryInterface;
use App\Repositories\AdminProfileRepository;
use App\Repositories\AdminRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Admin Repository Interface
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->bind(AdminProfileRepositoryInterface::class, AdminProfileRepository::class);
    }
}
