<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        // jika tidak login atau bukan admin -> redirect atau abort
        if (! $user || ($user->status ?? null) !== 'admin') {
            if ($request->expectsJson()) {
                abort(403);
            }
            return redirect()->route('home')->with('error', 'Unauthorized');
        }

        return $next($request);
    }
}