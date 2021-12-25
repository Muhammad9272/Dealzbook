<?php

namespace App\Http\Controllers;

use App\Branch;
use App\City;
use App\Repositories\Interfaces\BranchRepositoryInterface;
use App\Repositories\Interfaces\AdvertisementRepositoryInterface;

use App\Repositories\Interfaces\SocialRepositoryInterface;

use App\Store;
use Illuminate\Http\Request;

use App\Repositories\Interfaces\StoreRepositoryInterface;
use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;

class BranchController extends Controller
{
    protected $branchRepository;

    private $storeRepository;

    private $cityRepository;

    private $countryRepository;

    private $tagRepository;

    private $advertisementRepository;

    protected $socialRepository;


    public function __construct(BranchRepositoryInterface $branchRepository,
                StoreRepositoryInterface $storeRepository,
        CityRepositoryInterface $cityRepository,
        CountryRepositoryInterface $countryRepository,
        TagRepositoryInterface $tagRepository,
        AdvertisementRepositoryInterface $advertisementRepository,
        SocialRepositoryInterface $socialRepository
    )
    {
        $this->branchRepository =  $branchRepository;
        $this->storeRepository = $storeRepository;
        $this->cityRepository = $cityRepository;
        $this->countryRepository = $countryRepository;
        $this->tagRepository = $tagRepository;
        $this->advertisementRepository = $advertisementRepository;
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
    public function show($lang,Store $store, City $city, Branch $branch)
    {
        return view('pages.branch.show',[
            'store' => $store,
            'city' => $city,
            'branch' => $branch,
            'catalogs' => $this->branchRepository->catalogs($branch),
            'page_description' => $branch->page,
            'recent_stores' => $this->storeRepository->get($limit=8),
            'recent_cities' => $this->cityRepository->get($limit=8),
            'recent_countries' => $this->countryRepository->get($limit=5),
            'all_countries' => $this->countryRepository->all(),
            'tags' => $this->tagRepository->all(),
            'recent_stores' => $this->storeRepository->get($limit=8),
            'social'=> $this->socialRepository->all(),
            'all_cites' => $this->cityRepository->all()

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
