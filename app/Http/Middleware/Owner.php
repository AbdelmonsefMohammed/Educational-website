<?php

namespace App\Http\Middleware;

use Closure;

class Owner
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
        $user = auth()->user();

        if(strtolower($user->email) == 'monsef@gmail.com')
        {
            return $next($request);
        }else
        {
            return abort(404);
        }
        
    }
}
