<?php

namespace App\Repositories\Interfaces;

interface CityRepositoryInterface
{
    public function get($limit=5);
    public function all();

}
