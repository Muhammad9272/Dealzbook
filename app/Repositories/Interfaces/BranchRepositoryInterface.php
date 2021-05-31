<?php

namespace App\Repositories\Interfaces;

use App\Branch;

interface BranchRepositoryInterface
{
    public function catalogs(Branch $branch);
}