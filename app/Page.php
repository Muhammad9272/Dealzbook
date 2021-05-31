<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasTranslations;

    public $translatable = ['description'];

     /**
     * Get the owning pageable model.
     */
    public function pageable()
    {
        return $this->morphTo();
    }
}
