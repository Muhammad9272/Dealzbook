<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function setLocale($request)
    {
        
        $lang=Request::segment(1);
        if($lang=='en' || $lang=='ar'){
            app()->setLocale($lang);
            session(['locale' => $lang]);
        }else{
           $value = $request->session()->get('locale');
           app()->setLocale($value); 
        }
            

    }
}
