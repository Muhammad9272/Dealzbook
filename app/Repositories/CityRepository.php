<?php

namespace App\Repositories;

use App\City;
use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Support\Collection;

class CityRepository implements CityRepositoryInterface
{

    public function get( $limit = 5){

        return  City::orderBy('created_at', 'desc')->where('status',1)
                    ->limit($limit)
                    ->get();

    }

    public function all(){
        return  City::where('status',1)->get();
    }

   

}
