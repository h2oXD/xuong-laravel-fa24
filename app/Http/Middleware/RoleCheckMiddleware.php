<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/login')->with('msg', 'Bạn cần đăng nhập trước');
        }

        if ($request->path() == 'admin' && Auth::user()->role == 1) {
            return $next($request);
        }

        if ($request->path() == 'orders') {
            if (Auth::user()->role == 2 || Auth::user()->role == 1) {
                return $next($request);
            }
        }
        
        if($request->path() == 'profile'){
            if(Auth::user()->role == 3 || Auth::user()->role == 1){
                return $next($request);
            }
        }
        
        return redirect('/home')->with('msg', 'Bạn không có quyền truy cập');
    }
}
