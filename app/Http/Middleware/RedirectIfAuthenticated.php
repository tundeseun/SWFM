<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
=======
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
>>>>>>> tundeseun/devtest

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'store':
                if (Auth::guard($guard)->check()) {
                    return redirect('/store/home');
                }
                break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('/');
                }
                break;
        }
    
        return $next($request);
    }
    

=======
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
>>>>>>> tundeseun/devtest
}
