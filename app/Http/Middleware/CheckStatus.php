<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $guard = 'admin';

        if (Auth::guard($guard)->check()) {
            // $user = Auth()->user();
            $user = Auth::guard('admin')->user();

            if ($user->status) {
                return $next($request);
            } else {
                return redirect()->route('admin.login');
            }
        }
        abort(403);
    }
}
