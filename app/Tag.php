<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Tag extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $with = ['seoTags', 'page'];

    public function getRouteKeyName(){
        return 'slug';
    }

    /**
     * Get the store's branch seo tags.
     */
    public function seoTags()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }

    /**
     * A tag is associated with many catalogs
     */
    public function catalogs()
    {
        return $this->belongsToMany(Catalog::class);
    }

    /**
     * Get the tag's page description.
     */
    public function page()
    {
        return $this->morphOne('App\Page', 'pageable');
    }
}
