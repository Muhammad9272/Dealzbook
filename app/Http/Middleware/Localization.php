<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = session('locale');
        $request->session()->forget('locale');

        if(empty($locale)){
            return $next($request);
            // $locale = 'en';
            // app()->setLocale($locale);
            // session(['locale' => $locale]);
            // redirect('/en/'. $request->getRequestUri());

        }
        else{
            return redirect("/$locale". $request->getRequestUri());
        }

    }
}
