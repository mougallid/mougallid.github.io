<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->role_as == '1')
            {
                return $next($request);
            }
            else
            {
                return redirect('/home')->with('status','Accès refusé! comme tu n\'es pas en tant qu\'administrateur');
            }
        }
        else
        {
            return redirect('/home')->with('status','S\'il vous plait Connectez-vous d\'abord');
        }
    }
}
