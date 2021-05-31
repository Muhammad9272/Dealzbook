<?php

namespace App\Repositories\Interfaces;

use App\Store;

interface StoreRepositoryInterface
{
    public function all($city=null,$country=null);

    public function get($limit=5);

    public function availableInCities(Store $store);

    public function catalogs(Store $store);
}
