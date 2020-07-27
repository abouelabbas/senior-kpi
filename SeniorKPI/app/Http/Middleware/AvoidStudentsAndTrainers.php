<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class AvoidStudentsAndTrainers
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
        if($request->session()->get('role') != 'admin' ){
            if($request->session()->get('role') == 'student'){
                return Redirect::to('/Student');
            }else{
                return Redirect::to('/Trainer');
            }
        }
        return $next($request);
    }
}
