<?php

namespace App\Http\Controllers;

use App\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class LanguageController extends Controller
{
    public function setLanguage(Request $request, $language)
    {
        \Log::info($language);
        
        app()->setLocale($language);
        session(['locale' => $language]);
        $previousUrl = url()->previous();

        if($language == 'ar'){
            $url = preg_replace('/en/', 'ar', $previousUrl, 1);
            //$url = str_replace('en', $language,$previousUrl);
        }else{
            //$url = str_replace('ar', $language,$previousUrl);
            $url = preg_replace('/ar/', 'en', $previousUrl, 1);

        }

        return redirect($url);
    }
}
