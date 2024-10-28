<?php

namespace App\Http\Middleware;

use App\Models\Users;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next) : Response
    {
        if (!Session::has('user_id')) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để truy cập trang này.');;
        }
    
        $user = Users::where('user_id', Session::get('user_id'))->first();
        if (!$user || Session::get('user_password') !== $user->password_hash) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để truy cập trang này.');
        }
    
        return $next($request);
    }
}
