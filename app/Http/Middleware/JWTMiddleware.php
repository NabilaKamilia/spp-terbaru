<?php

namespace App\Http\Middleware;

use App\Traits\Response;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JWTMiddleware extends BaseMiddleware
{
    use Response;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        try {
            // dd($request);
            // dd($request);
            $user = JWTAuth::parseToken()->authenticate();
            // $curToken = Cookie::get('admin_cookie') ? 'admin_cookie' : (Cookie::get('dosen_cookie') ? 'dosen_cookie' : 'mahasiswa_cookie');
            // dd($user);
            return $next($request);
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return $this->error('Token is Invalid', 401);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return $this->error('Token is Expired', 401);
            } else {
                return $this->error('Authorization Token not found', 401);
            }
        }
    }
}
