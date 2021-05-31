<?php

namespace App\Repositories;

use App\Branch;
use App\Repositories\Interfaces\TermRepositoryInterface;
use App\Support\Collection;
use App\Term;

class TermRepository implements TermRepositoryInterface
{

    public function all(){

        return Term::where('status',1)->get();
        
    }
}