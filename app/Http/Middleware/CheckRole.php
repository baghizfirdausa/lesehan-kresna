<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next,...$roles)
    {
        foreach ($roles as $role) {
            if (! $request->user()->hasRole($role)) {
              return $next($request);
            }
          }
        return redirect('/');
    }
}
