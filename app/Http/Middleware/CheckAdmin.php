<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckAdmin
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
        if(Auth::check()) { // first check if there is a logged in user
    
            $type = Auth::user()->type; // get user type
            
            //if user is of admin type allow them to the next stage
            if($type == "admin"){
                return $next($request);
            //If not return them home
            } else {
                return redirect()->home();
            }
        } else {
            //If not logged in at all change them to the login page
            return redirect('/login');
        }
    }
}
