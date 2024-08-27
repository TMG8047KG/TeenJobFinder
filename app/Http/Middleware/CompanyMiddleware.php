<?php

namespace App\Http\Middleware;

use App\Policies\CompanyPolicy;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CompanyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->cannot('createCompany')){
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
