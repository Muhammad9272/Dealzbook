<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\Coupon;
use App\Repositories\Interfaces\AdvertisementRepositoryInterface;
use App\Repositories\Interfaces\CatalogRepositoryInterface;
use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\SocialRepositoryInterface;
use App\Repositories\Interfaces\StoreRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Store;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    protected $catalogRepository;

    private $storeRepository;

    private $cityRepository;

    private $countryRepository;

    private $tagRepository;

    private $advertisementRepository;

    protected $socialRepository;

    public function __construct(
        CatalogRepositoryInterface $catalogRepository,
        StoreRepositoryInterface $storeRepository,
        CityRepositoryInterface $cityRepository,
        CountryRepositoryInterface $countryRepository,
        TagRepositoryInterface $tagRepository,
        AdvertisementRepositoryInterface $advertisementRepository,
        SocialRepositoryInterface $socialRepository

    )
    {
        $this->catalogRepository = $catalogRepository;
        $this->storeRepository = $storeRepository;
        $this->cityRepository = $cityRepository;
        $this->countryRepository = $countryRepository;
        $this->tagRepository = $tagRepository;
        $this->advertisementRepository = $advertisementRepository;
        $this->socialRepository = $socialRepository;


    }

    public function index(Request $request)
    {

        $this->setLocale($request);
        $coupons=Coupon::where('status',1)->orderBy('featured', 'DESC')
                            ->orderBy('created_at', 'DESC')->paginate(20);
    
        return view('partials.coupons.index',[
            'coupons'=>$coupons,
            'catalogs' => $this->catalogRepository->all(),
            'recent_stores' => $this->storeRepository->get($limit=8),
            'recent_cities' => $this->cityRepository->get($limit=8),
            'recent_countries' => $this->countryRepository->get($limit=5),
            'all_countries' => $this->countryRepository->all(),
            'tags' => $this->tagRepository->all(),
            'recent_stores' => $this->storeRepository->get($limit=8),
            'social'=> $this->socialRepository->all(),
            'all_cites' => $this->cityRepository->all(),
            'all_catalogs_page_long_ad_1' => $this->advertisementRepository->get('all-catalogs-page-long-ad-1'),
            'all_catalogs_page_long_ad_2' => $this->advertisementRepository->get('all-catalogs-page-long-ad-2'),
            'all_catalogs_page_long_ad_3' => $this->advertisementRepository->get('all-catalogs-page-long-ad-3'),
            'top_banner' => $this->advertisementRepository->first('top-banner'),

        ]);

    }

    public function show($lang,$slug,Request $request)
    {

        $this->setLocale($request);
        $coupons=Coupon::where('status',1)->orderBy('featured', 'DESC')
                            ->orderBy('created_at', 'DESC')->paginate(20);

        $coupon=Coupon::where('slug',$slug)->where('status',1)->first();
        return view('partials.coupons.show',[

            'coupons'=>$coupons,
            'coupon'=>$coupon,
            'recent_cities' => $this->cityRepository->get($limit=8),
            'recent_countries' => $this->countryRepository->get($limit=5),
            'all_countries' => $this->countryRepository->all(),
            'tags' => $this->tagRepository->all(),
            'recent_stores' => $this->storeRepository->get($limit=8),
            'social'=> $this->socialRepository->all(),
            'all_cites' => $this->cityRepository->all(),
         
            'social'=> $this->socialRepository->all(),
            'all_cites' => $this->cityRepository->all(),
            'top_banner' => $this->advertisementRepository->first('top-banner'),

        ]);



    }


}
