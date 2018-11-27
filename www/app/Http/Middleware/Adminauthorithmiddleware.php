<?php

namespace App\Http\Middleware;

use Closure;

class Adminauthorithmiddleware
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
        if(empty($request->session()->get('idAdmin'))){
            return redirect('/loginAdmin');
        }
        return $next($request);
    }
}
