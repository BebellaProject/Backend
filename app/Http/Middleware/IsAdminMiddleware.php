<?php

namespace Bebella\Http\Middleware;

use Closure;

class IsAdminMiddleware
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
        if ($request->user()->type != "admin") 
        {
            return redirect()->to('/web');
        }
        
        return $next($request);
    }
}
