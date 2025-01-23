<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class RedirectIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = 'admin')
    {
        if (Auth::guard($guard)->check()) {
            // $message = 'Login Successfully.!';
            // Session::flash('success', $message);

            $user = Auth::guard('admin')->user();
            session()->put('user_info', [
                "user_id" => $user->id,
                "role_id" => $user->role_id,
                "role" => $user->role->name,
                "company_id" => $user->company_id,
                "company_name" => @$user->company->name,
                "company_display_name" => @$user->company->displayName,
                "company_short_name" => @$user->company->shortName,
                "fiscal_year_id" => @$user->company->fiscal_year->id,
                "fiscal_year" => @$user->company->fiscal_year->description,
            ]);

            return redirect()->route('admin.dashboard');
        }
        return $next($request);
    }
}
