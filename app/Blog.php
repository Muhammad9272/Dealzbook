<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasTranslations;

    public $translatable = ['title','small_detail', 'body'];

    protected $with = ['seoTags'];

    public function getRouteKeyName(){
        return 'slug';
    }

    /**
     * Get the blog's seo tags.
     */
    public function seoTags()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }
}
