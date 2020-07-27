<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class AvoidStudentsAndAdmins
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
        if($request->session()->get('role') != 'trainer' ){
            if($request->session()->get('role') == 'student'){
                return Redirect::to('/Student');
            }
            // else{
            //     return Redirect::to('/Admin');
            // }
        }
        return $next($request);
    }
}
