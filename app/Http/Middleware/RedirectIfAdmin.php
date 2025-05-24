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

            // $user = Auth::guard('admin')->user();
            // $company_and_role = $user->company_and_role ?? null;

            // if (!$company_and_role) {
            //     Auth::guard('admin')->logout();
            //     return redirect()->route('admin.login');
            // }

            // $company_and_role = $company_and_role->where('company_id', 4)->first();

            // session()->put('user_info', [
            //     "user_id" => $user->id,
            //     "role_id" => $company_and_role->role_id,
            //     "role" => $company_and_role->role->name,
            //     "company_id" => $company_and_role->company_id,
            //     "company_name" => @$company_and_role->company->name,
            //     "company_display_name" => @$company_and_role->company->displayName,
            //     "company_short_name" => @$company_and_role->company->shortName,
            //     "fiscal_year_id" => @$company_and_role->company->fiscal_year->id,
            //     "fiscal_year" => @$company_and_role->company->fiscal_year->description,
            // ]);

            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
