<?php

namespace App\Repositories;

use App\Repositories\Interfaces\FaqRepositoryInterface;
use App\Faq;

class FaqRepository implements FaqRepositoryInterface
{

    public function all(){

        return Faq::where('status',1)->get();
        
    }
}