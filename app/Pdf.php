<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    public function pdfable()
    {
        return $this->morphTo();
    }
}
