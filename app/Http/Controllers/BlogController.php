<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Repositories\Interfaces\AdvertisementRepositoryInterface;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Repositories\Interfaces\CatalogRepositoryInterface;
use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\SocialRepositoryInterface;
use App\Repositories\Interfaces\StoreRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogRepository;

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
        BlogRepositoryInterface $blogRepository,
        AdvertisementRepositoryInterface $advertisementRepository,
        SocialRepositoryInterface $socialRepository

    )
    {
        $this->catalogRepository = $catalogRepository;
        $this->storeRepository = $storeRepository;
        $this->cityRepository = $cityRepository;
        $this->countryRepository = $countryRepository;
        $this->tagRepository = $tagRepository;
        $this->blogRepository = $blogRepository;
        $this->advertisementRepository = $advertisementRepository;
        $this->socialRepository = $socialRepository;

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        $this->setLocale($request);

        return view('pages.blog.index',[
            'blogs' => $this->blogRepository->all(),
            'latest_blogs' => $this->blogRepository->latest($limit=4),
            'popular_blogs' => $this->blogRepository->popular($limit=4),
            'recent_stores' => $this->storeRepository->get($limit=8),
            'recent_cities' => $this->cityRepository->get($limit=8),
            'recent_countries' => $this->countryRepository->get($limit=5),
            'all_countries' => $this->countryRepository->all(),
            'latest_catalogs'=> $this->catalogRepository->latest($limit=4),
            'blog_right_sections' => $this->advertisementRepository->get('side-banner1'),
            'social'=> $this->socialRepository->all(),
            'all_cites' => $this->cityRepository->all(),
            'all_blogs_page_long_ad_1' => $this->advertisementRepository->get('all-stores-page-long-ad-1'),
            'all_blogs_page_long_ad_2' => $this->advertisementRepository->get('all-stores-page-long-ad-2'),
            'top_banner' => $this->advertisementRepository->first('top-banner'),
        ]);
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
    public function show($lang, Request $request, Blog $blog)
    {

        $this->setLocale($request);

        //increment total_views
        $this->blogRepository->viewed($blog);

        return view('pages.blog.show',[
            'blog' => $blog,
            'latest_blogs' => $this->blogRepository->latest($limit=4),
            'popular_blogs' => $this->blogRepository->popular($limit=4),
            'recent_stores' => $this->storeRepository->get($limit=8),
            'recent_cities' => $this->cityRepository->get($limit=8),
            'recent_countries' => $this->countryRepository->get($limit=5),
            'all_countries' => $this->countryRepository->all(),
            'latest_catalogs'=> $this->catalogRepository->latest($limit=4),
            'blog_right_sections' => $this->advertisementRepository->get('side-banner1'),
            'blog_long_ad_1' => $this->advertisementRepository->get('all-stores-page-long-ad-1'),
            'blog_long_ad_2' => $this->advertisementRepository->get('all-stores-page-long-ad-2'),
            'social'=> $this->socialRepository->all(),
            'all_cites' => $this->cityRepository->all(),
            'top_banner' => $this->advertisementRepository->first('top-banner'),

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
