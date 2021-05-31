<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Branch extends Model
{
    use HasTranslations;

    public $translatable = ['name', 'opening_hours', 'address'];
    
    protected $with = ['city', 'store', 'mall', 'seoTags', 'page'];

    public function getRouteKeyName(){
        return 'slug';
    }
    
    public function city(){
        return $this->belongsTo(City::class);
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function mall(){
        return $this->belongsTo(Mall::class);
    }

    /**
     * Get the store's branch seo tags.
     */
    public function seoTags()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }

    /**
     * A branch have multiple catalogs
     */
    public function catalogs(){
        return $this->belongsToMany(Catalog::class);
    }

    /**
     * Get the branch's page description.
     */
    public function page()
    {
        return $this->morphOne('App\Page', 'pageable');
    }
}
