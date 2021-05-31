<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\FaqRepositoryInterface;
use App\Repositories\Interfaces\SocialRepositoryInterface;
use App\Repositories\Interfaces\StoreRepositoryInterface;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $storeRepository;

    protected $cityRepository;

    protected $countryRepository;

    protected $socialRepository;

    public function __construct(
        StoreRepositoryInterface $storeRepository,
        CityRepositoryInterface $cityRepository,
        CountryRepositoryInterface $countryRepository,
        SocialRepositoryInterface $socialRepository
    )
    {
        $this->storeRepository = $storeRepository;
        $this->cityRepository = $cityRepository;
        $this->countryRepository = $countryRepository;
        $this->socialRepository = $socialRepository;
    }
}
