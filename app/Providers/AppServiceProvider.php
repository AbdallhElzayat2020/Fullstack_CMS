<?php

namespace App\Providers;

use App\Interfaces\AdminAboutRepositoryInterface;
use App\Interfaces\AdminCategoriesRepositoryInterface;
use App\Interfaces\AdminContactMessageRepositoryInterface;
use App\Interfaces\AdminContactRepositoryInterface;
use App\Interfaces\AdminFooterInfoRepositoryInterface;
use App\Interfaces\AdminFooterRepositoryGridOneInterface;
use App\Interfaces\AdminFooterRepositoryGridThreeInterface;
use App\Interfaces\AdminFooterRepositoryGridTwoInterface;
use App\Interfaces\AdminHomeSectionRepositoryInterface;
use App\Interfaces\AdminLanguageRepositoryInterface;
use App\Interfaces\AdminNewsRepositoryInterface;
use App\Interfaces\AdminProfileRepositoryInterface;
use App\Interfaces\AdminRepositoryInterface;
use App\Interfaces\AdminSettingRepositoryInterface;
use App\Interfaces\AdminSocialCountRepositoryInterface;
use App\Interfaces\AdminSocialLInkRepositoryInterface;
use App\Interfaces\AdminSubscriberRepositoryInterface;
use App\Interfaces\HomeRepositoryInterface;
use App\Interfaces\NewsSearchRepositoryInterface;
use App\Models\Setting;
use App\Repositories\AdminAboutRepository;
use App\Repositories\AdminCategoriesRepository;
use App\Repositories\AdminContactMessageRepository;
use App\Repositories\AdminContactRepository;
use App\Repositories\AdminFooterInfoRepository;
use App\Repositories\AdminFooterRepositoryGridOne;
use App\Repositories\AdminFooterRepositoryGridThree;
use App\Repositories\AdminFooterRepositoryGridTwo;
use App\Repositories\AdminHomeSectionRepository;
use App\Repositories\AdminLanguageRepository;
use App\Repositories\AdminNewsRepository;
use App\Repositories\AdminProfileRepository;
use App\Repositories\AdminRepository;
use App\Repositories\AdminSettingRepository;
use App\Repositories\AdminSocialCountRepository;
use App\Repositories\AdminSocialLInkRepository;
use App\Repositories\AdminSubscriberRepository;
use App\Repositories\HomeRepository;
use App\Repositories\NewsSearchRepository;
use Illuminate\Support\Facades\View;
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
        $this->app->bind(AdminHomeSectionRepositoryInterface::class, AdminHomeSectionRepository::class);
        $this->app->bind(AdminSocialCountRepositoryInterface::class, AdminSocialCountRepository::class);
        $this->app->bind(NewsSearchRepositoryInterface::class, NewsSearchRepository::class);
        $this->app->bind(AdminSubscriberRepositoryInterface::class, AdminSubscriberRepository::class);
        $this->app->bind(AdminSocialLInkRepositoryInterface::class, AdminSocialLInkRepository::class);
        $this->app->bind(AdminFooterInfoRepositoryInterface::class, AdminFooterInfoRepository::class);
        $this->app->bind(AdminFooterRepositoryGridOneInterface::class, AdminFooterRepositoryGridOne::class);
        $this->app->bind(AdminFooterRepositoryGridTwoInterface::class, AdminFooterRepositoryGridTwo::class);
        $this->app->bind(AdminFooterRepositoryGridThreeInterface::class, AdminFooterRepositoryGridThree::class);
        $this->app->bind(AdminAboutRepositoryInterface::class, AdminAboutRepository::class);
        $this->app->bind(AdminContactRepositoryInterface::class, AdminContactRepository::class);
        $this->app->bind(AdminContactMessageRepositoryInterface::class, AdminContactMessageRepository::class);
        $this->app->bind(AdminSettingRepositoryInterface::class, AdminSettingRepository::class);

        /* Fetch Setting for ALl Project */
        $setting = Setting::pluck('value', 'key')->toArray();
//        $setting = Setting::all()->pluck('value')->toArray();

        View::composer('*', function ($view) use ($setting) {
            $view->with('setting', $setting);
        });
    }
}
