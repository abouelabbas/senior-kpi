<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class AvoidTrainersAndAdmins
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
        if($request->session()->get('role') != 'student' ){
            if($request->session()->get('role') == 'trainer'){
                return Redirect::to('/Trainer');
            }
            // else{
            //     return Redirect::to('/Admin');
            // }
        }
        return $next($request);
    }
}
