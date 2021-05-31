<?php

namespace App\Http\Controllers;

use App\About;
use App\City;
use App\Home;
use App\Repositories\Interfaces\AdvertisementRepositoryInterface;
use App\Repositories\Interfaces\BannerRepositoryInterface;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Repositories\Interfaces\CatalogRepositoryInterface;
use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\SocialRepositoryInterface;
use App\Repositories\Interfaces\StoreRepositoryInterface;
use Illuminate\Http\Request;

class CityController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filter(Request  $request, $lang, City $city)
    {
        $this->setLocale($request);

        $stores = $this->storeRepository->all($city);
        $latest_catalogs = $this->catalogRepository->latest(4, $city);
        $popular_catalogs =  $this->catalogRepository->popular(15, $city);
        return view('home',[
            'stores' => $stores,
            'latest_catalogs' => $latest_catalogs,
            'popular_catalogs' => $popular_catalogs,
            'page_description' => Home::first(),
            'banners' => $this->bannerRepository->all(),
            'latest_blog' => $this->blogRepository->latest(1),
            'recent_stores' => $this->storeRepository->get($limit=8),
            'all_cites' => $this->cityRepository->all(),
            'recent_cities' => $this->cityRepository->get($limit=8),
            'recent_countries' => $this->countryRepository->get($limit=5),
            'all_countries' => $this->countryRepository->all(),
            'social'=> $this->socialRepository->all(),
            'home_long_ad_1' => $this->advertisementRepository->get('home-long-ad-1'),
            'home_long_ad_2' => $this->advertisementRepository->get('home-long-ad-2'),
            'home_long_ad_3' => $this->advertisementRepository->get('home-long-ad-3'),
            'current_city' => $city,
            'about' => About::get()


        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
