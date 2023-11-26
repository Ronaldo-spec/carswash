<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class cekRole
    {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
        {
        $user = $request->user();

        // Periksa apakah pengguna memiliki peran yang sesuai
        if($user && in_array($user->role, $roles)) {
            return $next($request);
            }

        if($user) {
            Auth::logout();
            }

        abort(403, 'Anda tidak memiliki hak mengakses laman tersebut!');
        return redirect('/login');
        }
    }


