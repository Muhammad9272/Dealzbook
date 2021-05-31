<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Mall extends Model
{
    use HasTranslations;

    public $translatable = ['name', 'opening_hours', 'address'];

    protected $with = ['city', 'page'];

    public function getRouteKeyName(){
        return 'slug';
    }
    
    public function city(){
        return $this->belongsTo(City::class);
    }   

    /**
     * Get the malls's page description.
     */
    public function page()
    {
        return $this->morphOne('App\Page', 'pageable');
    }
}
