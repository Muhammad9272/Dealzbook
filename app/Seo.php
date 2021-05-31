<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Seo extends Model
{
    use HasTranslations;

    public $guarded = [];

    public $translatable = ['title','description'];

     /**
     * Get the owning seoable model.
     */
    public function seoable()
    {
        return $this->morphTo();
    }
}
