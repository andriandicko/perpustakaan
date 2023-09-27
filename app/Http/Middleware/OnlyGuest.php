<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlyGuest
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
        // disini kita kasih tau apa yang harus dilakukan kalau akun yang login bukan guest
        if (Auth::user()) {
            return redirect('/');
        }

        // disini kita kasih tau apa yang harus dilakukan kalau akun yang login adalah guest
        return $next($request);
    }
}
