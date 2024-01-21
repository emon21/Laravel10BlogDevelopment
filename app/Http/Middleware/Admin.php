<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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

        //conditional
        if(auth()->user()->role_as==1){
            return $next($request);
        }
        //not admin redirect
        return redirect()->route('home')->with('error','you are not a admin');
    }
}
