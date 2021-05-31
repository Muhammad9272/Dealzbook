<?php

namespace App\Repositories\Interfaces;

use App\Banner;

interface AdvertisementRepositoryInterface
{
    public function get($location='store-left-section');
}
