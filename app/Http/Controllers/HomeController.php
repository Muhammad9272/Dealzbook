<?php

namespace App\Http\Controllers;

use App\About;
use App\Home;
use App\Repositories\BannerRepository;
use App\Repositories\Interfaces\AdvertisementRepositoryInterface;
use App\Repositories\Interfaces\BannerRepositoryInterface;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Repositories\Interfaces\CatalogRepositoryInterface;
use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\SocialRepositoryInterface;
use App\Repositories\Interfaces\StoreRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    private $advertisementRepository;

    private $storeRepository;

    private $catalogRepository;

    private $bannerRepository;

    private $blogRepository;

    private $cityRepository;

    private $countryRepository;

    protected $socialRepository;



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        StoreRepositoryInterface $storeRepository,
        CatalogRepositoryInterface $catalogRepository,
        BannerRepositoryInterface $bannerRepository,
        BlogRepositoryInterface $blogRepository,
        CityRepositoryInterface $cityRepository,
        CountryRepositoryInterface $countryRepository,
        SocialRepositoryInterface $socialRepository,
        AdvertisementRepositoryInterface $advertisementRepository

    )
    {
        $this->storeRepository = $storeRepository;
        $this->catalogRepository = $catalogRepository;
        $this->bannerRepository = $bannerRepository;
        $this->blogRepository = $blogRepository;
        $this->cityRepository = $cityRepository;
        $this->countryRepository = $countryRepository;
        $this->socialRepository = $socialRepository;
        $this->advertisementRepository = $advertisementRepository;
    }

    protected function setLocale($request)
    {
        $value = $request->session()->get('locale');

        app()->setLocale($value);

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $this->setLocale($request);

        $stores = $this->storeRepository->all();
        $latest_catalogs = $this->catalogRepository->latest(12);
        $popular_catalogs =  $this->catalogRepository->popular();
        $featured_catalogs = $this->catalogRepository->featured();
        return view('home',[
            'stores' => $stores,
            'latest_catalogs' => $latest_catalogs,
            'popular_catalogs' => $popular_catalogs,
            'featured_catalogs' => $featured_catalogs,
            'page_description' => Home::first(),
            'banners' => $this->bannerRepository->all(),
            'latest_blog' => $this->blogRepository->latest(1),
            'recent_stores' => $this->storeRepository->get($limit=8),
            'all_cites' => $this->cityRepository->all(),
            'recent_cities' => $this->cityRepository->get($limit=8),
            'recent_countries' => $this->countryRepository->get($limit=8),
            'all_countries' => $this->countryRepository->all(),
            'social'=> $this->socialRepository->all(),
            'home_long_ad_1' => $this->advertisementRepository->get('home-long-ad-1'),
            'home_long_ad_2' => $this->advertisementRepository->get('home-long-ad-2'),
            'home_long_ad_3' => $this->advertisementRepository->get('home-long-ad-3'),
            'about' => About::get()

        ]);
    }
}
