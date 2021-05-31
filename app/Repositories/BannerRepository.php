<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BannerRepositoryInterface;
use App\Banner;
use App\Support\Collection;

class BannerRepository implements BannerRepositoryInterface
{

    public function all($status = 1){

        return  Banner::where('status',$status)->orderBy('created_at', 'desc')->get();

    }
   
}