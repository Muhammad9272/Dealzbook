<?php

namespace App\Repositories\Interfaces;

use App\Blog;

interface BlogRepositoryInterface
{
    public function all($order = 'desc');

    public function latest($limit = 5);

    public function popular($limit = 5);

    public function viewed(Blog $blog);

}
