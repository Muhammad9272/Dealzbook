<?php

namespace App;
use App\City;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasTranslations;
    
    public $translatable = ['name'];

    protected $guarded = [] ;

    protected $with = ['page'];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function city(){
        return $this->hasMany(City::class);
    }
    /**
     * Get the country's page description.
     */
    public function page()
    {
        return $this->morphOne('App\Page', 'pageable');
    }
}
