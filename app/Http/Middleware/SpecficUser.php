<?php

namespace App\Http\Middleware;

use App\Models\Question;
use Closure;
use Illuminate\Http\Request;

class SpecficUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        dd($request);
        return $next($request);
    }
}
