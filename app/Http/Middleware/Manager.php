<?php

namespace App\Http\Middleware;

use Closure;

class Manager
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->user_id) {
            return redirect(route('home'))->withErrors('You Not a Manager');
        }
        return $next($request);
    }
}
