<?php

namespace App\Repositories\Interfaces;

use App\Catalog;

interface CatalogRepositoryInterface
{
    public function all();

    public function latest( $limit = 12, $city=null, $country=null);

    public function search($name);

    public function popular($limit = 12, $city=null, $country=null);

    public function featured();

    public function inCities(Catalog $catalog);

    public function viewed(Catalog $catalog);

}
