<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and has admin role
        if ($request->user() && $request->user()->isAdmin()) {
            return $next($request);
        }

        // Redirect an error response if the user is not authorized
        return redirect()->route('users.profile')->with('error', 'You do not have permission to access this page.');
    }
}
