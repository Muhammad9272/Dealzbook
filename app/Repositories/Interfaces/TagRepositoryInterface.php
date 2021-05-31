<?php

namespace App\Repositories\Interfaces;

interface TagRepositoryInterface
{
    public function get($status=1,$limit=5);
    public function all($status=1);
}