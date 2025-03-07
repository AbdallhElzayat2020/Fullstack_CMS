<?php

namespace App\Providers;

use App\Interfaces\AdminCategoriesRepositoryInterface;
use App\Interfaces\AdminLanguageRepositoryInterface;
use App\Interfaces\AdminNewsRepositoryInterface;
use App\Interfaces\AdminProfileRepositoryInterface;
use App\Interfaces\AdminRepositoryInterface;
use App\Repositories\AdminCategoriesRepository;
use App\Repositories\AdminLanguageRepository;
use App\Repositories\AdminNewsRepository;
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
        $this->app->bind(AdminLanguageRepositoryInterface::class, AdminLanguageRepository::class);
        $this->app->bind(AdminCategoriesRepositoryInterface::class, AdminCategoriesRepository::class);
        $this->app->bind(AdminNewsRepositoryInterface::class, AdminNewsRepository::class);
    }
}
