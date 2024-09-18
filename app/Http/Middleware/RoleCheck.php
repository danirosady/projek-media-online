<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role_list_from_route): Response
    {

        $role_list = explode('-', $role_list_from_route);
        if (in_array(Auth::user()->role, $role_list)) {
            return $next($request);
        }
        return back()->with('error', 'Anda bukan sebagai ' . $role_list_from_route . ' !');

    }
}
