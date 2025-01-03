<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RestrictRoleAccess
{

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role->name === 'user') {
            if ($request->is('admin*')) {
                abort(403, 'Unauthorized access');
            }
        } else if (Auth::check() && Auth::user()->role->name === 'admin') {
            if ($request->is('user*')) {
                abort(403, 'Unauthorized access');
            }
        }
        return $next($request);
    }
}
