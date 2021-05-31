<?php

namespace App\Repositories\Interfaces;

interface CountryRepositoryInterface
{
    public function get($limit=5);

    public function all();

}
