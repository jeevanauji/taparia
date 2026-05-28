<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
   
    public function handle($request, Closure $next, ...$guards)
    {
        // If the user is authenticated
        if (Auth::check()) {
            // Redirect authenticated users away from 'login' or 'admin' routes
            if ($request->route() && in_array($request->route()->getName(), ['login', 'admin'])) {
                return redirect('/admin/dashboard');
            }
    
            return $next($request); // Allow the request to proceed
        }
    
        // If the user is not authenticated, redirect away from restricted routes
        if ($request->route() && $request->route()->getName() !== 'login') {
            return redirect('/admin/login');
        }
    
        return $next($request);
    }
    
}
