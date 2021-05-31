<?php

namespace App\Repositories;

use App\Branch;
use App\Repositories\Interfaces\BranchRepositoryInterface;
use App\Support\Collection;

class BranchRepository implements BranchRepositoryInterface
{
    /**
     * pass all the store catalogs
     * that have status true
    */
    public function catalogs(Branch $branch){

        $catalogs = $branch->catalogs->where('status',1)->paginate(16);
        
        return $catalogs;
    }
}