<?php

namespace App\Repositories\Interfaces;

use App\Banner;

interface BannerRepositoryInterface
{
    public function all($status=1);

}