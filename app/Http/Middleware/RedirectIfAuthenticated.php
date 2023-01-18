<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // $guards = empty($guards) ? [null] : $guards;
        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect()->route('admin.dashboard');
        //     }
        // }

        // return $next($request);
        switch ($guards) {
            case 'user':
                if (Auth::guard($guards)->check()) {
                    return redirect()->route('admin.dashboard');
                }
                break;
            case 'visitor':
                if (Auth::guard($guards)->check()) {
                    return redirect()->route('frontend.home');
                }
                break;
            case 'teacher':
                if (Auth::guard($guards)->check()) {
                    return redirect()->route('teacher.register.view');
                }
                break;
            default:
                if (Auth::guard($guards)->check()) {
                    return redirect('/');
                }
                break;
        }
    }
}
