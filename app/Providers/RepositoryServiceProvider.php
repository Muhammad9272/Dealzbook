<?php

namespace App\Providers;

use App\Repositories\AdvertisementRepository;
use App\Repositories\BlogRepository;
use App\Repositories\BannerRepository;
use App\Repositories\Interfaces\AdvertisementRepositoryInterface;
use App\Repositories\Interfaces\SocialRepositoryInterface;
use App\Repositories\SocialRepository;
use App\Repositories\StoreRepository;
use App\Repositories\CatalogRepository;
use App\Repositories\BranchRepository;
use App\Repositories\CityRepository;
use App\Repositories\CountryRepository;
use App\Repositories\FaqRepository;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Repositories\Interfaces\BannerRepositoryInterface;
use App\Repositories\Interfaces\StoreRepositoryInterface;
use App\Repositories\Interfaces\CatalogRepositoryInterface;
use App\Repositories\Interfaces\BranchRepositoryInterface;
use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\FaqRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Repositories\Interfaces\TermRepositoryInterface;
use App\Repositories\TagRepository;
use App\Repositories\TermRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            StoreRepositoryInterface::class,
            StoreRepository::class
        );

        $this->app->bind(
            CatalogRepositoryInterface::class,
            CatalogRepository::class
        );

        $this->app->bind(
            BranchRepositoryInterface::class,
            BranchRepository::class
        );

        $this->app->bind(
            TermRepositoryInterface::class,
            TermRepository::class
        );

        $this->app->bind(
            FaqRepositoryInterface::class,
            FaqRepository::class
        );

        $this->app->bind(
            BlogRepositoryInterface::class,
            BlogRepository::class
        );

        $this->app->bind(
            BannerRepositoryInterface::class,
            BannerRepository::class
        );

        $this->app->bind(
            CityRepositoryInterface::class,
            CityRepository::class
        );

        $this->app->bind(
            CountryRepositoryInterface::class,
            CountryRepository::class
        );

        $this->app->bind(
            TagRepositoryInterface::class,
            TagRepository::class
        );

        $this->app->bind(
            AdvertisementRepositoryInterface::class,
            AdvertisementRepository::class
        );

        $this->app->bind(
            SocialRepositoryInterface::class,
            SocialRepository::class
        );
    }
}
