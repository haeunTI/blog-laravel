<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if($request->user()->role != $role){
            $url = $request->user()->role ;
            if ($request->user()->role == "user") 
            {
                return redirect('/dashboard');
            } else {
                return redirect("/$url/dashboard");
            }
        }
        return $next($request);
    }
}
