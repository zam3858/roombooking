<?php

namespace App\Http\Middleware;

use Closure;

class Branch
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
        //if ada send name with value of KL, redirect to rooms/6
        if($request->name == "KL" ) {
            return redirect("/rooms/6");
        } else {
            return $next($request);
        }
    }
}
