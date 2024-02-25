<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(Auth::check()){
            if(auth()->user()->role_as==1){
                return $next($request);
            }
            else{
                //not admin redirect
                return redirect()->route('home')->with('error','you are not a admin');
            }
        }
        else{
            return redirect('/login')->with('message' ,'Please First Login');
         }
    }
}
