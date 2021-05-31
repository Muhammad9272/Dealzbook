<?php

namespace App\Repositories;

use App\Tag;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Support\Collection;

class TagRepository implements TagRepositoryInterface
{

    public function get($status=1,$limit = 5){

        return  Tag::orderBy('created_at', 'desc')
                    ->where('status',$status)
                    ->limit($limit)
                    ->get();

    }

    public function all($status=1){

        return  Tag::orderBy('created_at', 'desc')
                    ->where('status',$status)
                    ->get();

    }
   
}