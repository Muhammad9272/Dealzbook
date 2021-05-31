<?php

namespace App\Repositories;

use App\Advertisement;
use App\Repositories\Interfaces\AdvertisementRepositoryInterface;

class AdvertisementRepository implements AdvertisementRepositoryInterface
{

    public function get($location = 'store-left-section')
    {

        return Advertisement::where('location', $location)
            ->where('status', 1)
            ->get();

    }

    public function first($location = 'store-left-section')
    {

        return Advertisement::where('location', $location)
            ->where('status', 1)
            ->first();

    }

}
