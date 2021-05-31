<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\Repositories\Interfaces\AdvertisementRepositoryInterface;
use App\Repositories\Interfaces\CatalogRepositoryInterface;
use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\SocialRepositoryInterface;
use App\Repositories\Interfaces\StoreRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;
use Illuminate\Http\Request;
use App\Tag;
use App\Support\Collection;

class TagController extends Controller
{

    private $cityRepository;
    protected $storeRepository;
    private $countryRepository;
    protected $socialRepository;

    public function __construct(
        CityRepositoryInterface $cityRepository,
        CountryRepositoryInterface $countryRepository,
        StoreRepositoryInterface $storeRepository,
        SocialRepositoryInterface $socialRepository
    )
    {
        $this->cityRepository = $cityRepository;
        $this->countryRepository = $countryRepository;
        $this->storeRepository = $storeRepository;
        $this->socialRepository = $socialRepository;
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
    public function show(Tag $tag)
    {
        $tag_catalogs = $tag->catalogs->where('status',1)->paginate(16);

        return view('pages.tag.show',[
            'tag' => $tag,
            'tag_catalogs' => $tag_catalogs,
            'recent_stores' => $this->storeRepository->get($limit=8),
            'page_description' => $tag->page,
            'all_cites' => $this->cityRepository->all(),
            'recent_cities' => $this->cityRepository->get($limit=8),
            'recent_countries' => $this->countryRepository->get($limit=5),
            'social'=> $this->socialRepository->all(),
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
