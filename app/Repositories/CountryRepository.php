<?php

namespace App\Repositories;

use App\Country;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Support\Collection;

class CountryRepository implements CountryRepositoryInterface
{

    public function get( $limit = 5){

        return  Country::orderBy('created_at', 'desc')
                    ->limit($limit)
                    ->get();

    }

    public function all(){

        return  Country::orderBy('created_at', 'desc')
            ->get();

    }

}
