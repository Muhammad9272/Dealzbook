<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Advertisement extends Model
{
    use HasTranslations;

    public $translatable = ['image', 'url', 'ad'];

}
