<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Carbon\Carbon;

class Catalog extends Model
{
    use HasTranslations;

    public $translatable = ['name', 'description', 'start_at', 'end_at'];

    protected $with = ['store', 'seoTags', 'images', 'tags', 'branches', 'pdfs', 'page'];

    public function getRouteKeyName(){
        return 'slug';
    }

    /**
     * Get all of the catalog's images.
     * in asc order
     */
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable')->orderBy('order');
    }

    public function imagesStore()
    {
        return $this->hasMany('App\Image');
    }

    /**
     * Get all of the catalog's pdf.
     */
    public function pdfs()
    {
        return $this->morphMany('App\Pdf', 'pdfable');
    }

    /**
    * Get the store's branch seo tags.
    */
    public function seoTags()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }

    /*
    * A catalog belongs to a store
    */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     *  A catalog has many tags
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * A Catalog can exist in multiple branches
     */
    public function branches()
    {
        return $this->belongsToMany('App\Branch');
    }

    /**
     * Get the catalog's page description.
     */
    public function page()
    {
        return $this->morphOne('App\Page', 'pageable');
    }


    public function city(){
        return $this->belongsTo(City::class);
    }
    
    public function  ifExistInTheCity(){

        $city = htmlspecialchars(request('city'));
        $city = City::where('slug', $city)->first();

        if($city){

            $branches = $this->branches;

            foreach ($branches as $branch){

                if($city->id == $branch->city_id){
                    return true;
                }
                else{
                    return false;
                }

            }

        }else{
            return true;
        }
    }

    public function expired()
    {
        $time=Carbon::now();
        if($this->end_at && Carbon::parse($this->getTranslation('end_at', 'en') )->addDay(1)<=$time){
            return true;
        }
        else{
            return false;
        }
    }


}
