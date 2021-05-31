<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Store extends Model
{
    use HasTranslations;

    protected $with = ['seoTags', 'page'];

    public $translatable = ['name','about'];


    public function getRouteKeyName(){
        return 'slug';
    }

    /**
     * Get the store's seo tags.
     */
    public function seoTags()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }

    /*
    * Store have multple branches
    */
    public function branches(){
        return $this->hasMany(Branch::class);
    }

    /**
     * Get the store's page description.
     */
    public function page()
    {
        return $this->morphOne('App\Page', 'pageable');
    }

    /**
     * A store have many catalogs
     */
    public function catalogs(){
        return $this->hasMany(Catalog::class);
    }
    
}
