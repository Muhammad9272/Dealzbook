<?php

namespace App\Repositories;

use App\Repositories\Interfaces\FaqRepositoryInterface;
use App\Faq;
use App\Repositories\Interfaces\SocialRepositoryInterface;
use App\Social;

class SocialRepository implements SocialRepositoryInterface
{

    public function all(){

        return Social::first();

    }
}
