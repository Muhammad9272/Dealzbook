<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Home extends Model
{
    use HasTranslations;

    public $translatable = ['seo_title', 'seo_description', 'description'];

}
