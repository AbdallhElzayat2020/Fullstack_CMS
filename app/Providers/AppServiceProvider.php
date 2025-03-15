<?php

namespace App\Providers;

use App\Interfaces\AdminCategoriesRepositoryInterface;
use App\Interfaces\AdminLanguageRepositoryInterface;
use App\Interfaces\AdminNewsRepositoryInterface;
use App\Interfaces\AdminProfileRepositoryInterface;
use App\Interfaces\AdminRepositoryInterface;
use App\Interfaces\AdminSocialCountRepositoryInterface;
use App\Interfaces\AdminSubscriberRepositoryInterface;
use App\Interfaces\HomeRepositoryInterface;
use App\Interfaces\NewsSearchRepositoryInterface;
use App\Repositories\AdminCategoriesRepository;
use App\Repositories\AdminLanguageRepository;
use App\Repositories\AdminNewsRepository;
use App\Repositories\AdminProfileRepository;
use App\Repositories\AdminRepository;
use App\Repositories\AdminSocialCountRepository;
use App\Repositories\AdminSubscriberRepository;
use App\Repositories\HomeRepository;
use App\Repositories\NewsSearchRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // pagination
        Paginator::useBootstrap();

        //Admin Repository Interface
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->bind(AdminProfileRepositoryInterface::class, AdminProfileRepository::class);
        $this->app->bind(AdminLanguageRepositoryInterface::class, AdminLanguageRepository::class);
        $this->app->bind(AdminCategoriesRepositoryInterface::class, AdminCategoriesRepository::class);
        $this->app->bind(AdminNewsRepositoryInterface::class, AdminNewsRepository::class);
        $this->app->bind(HomeRepositoryInterface::class, HomeRepository::class);
        $this->app->bind(AdminSocialCountRepositoryInterface::class, AdminSocialCountRepository::class);
        $this->app->bind(NewsSearchRepositoryInterface::class, NewsSearchRepository::class);
        $this->app->bind(AdminSubscriberRepositoryInterface::class, AdminSubscriberRepository::class);
    }
}
