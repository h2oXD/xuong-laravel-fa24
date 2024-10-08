<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class YearOldCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect('/login')->with('msg', 'Bạn chưa đăng nhập.');
        }
        if (Auth::user()->tuoi > 18) {
            return $next($request);
        }
        return redirect('/home')->with('msg', 'Bạn chưa đủ 18 tuổi để truy cập trang này.');
    }
}
