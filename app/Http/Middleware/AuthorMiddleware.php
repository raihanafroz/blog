<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

      if (strtolower(auth()->user()->type) != 'author') {
        abort(403);
      }
      return $next($request);
    }
}
