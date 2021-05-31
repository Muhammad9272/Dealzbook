<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasTranslations;
    
    public $translatable = ['name'];

    protected $guarded = [] ;
    
    protected $with = ['country', 'page'];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the city's page description.
     */
    public function page()
    {
        return $this->morphOne('App\Page', 'pageable');
    }
}
