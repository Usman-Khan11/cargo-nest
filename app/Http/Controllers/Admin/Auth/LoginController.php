<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\SubCompany;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public $redirectTo = 'admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.guest')->except('logout');
    }
    public function showLoginForm()
    {
        $domains = domains();
        $host = $_SERVER['HTTP_HOST'];
        $sub_company_id = $domains[$host];
        $company = SubCompany::where('id', $sub_company_id)->first();

        if (!$company) {
            abort(403, 'Unauthorized action.');
            return;
        } else {
            $data['sub_company'] = $company;
        }

        $data['seo_title']      = "Admin Sign In";
        $data['seo_desc']       = "Admin Sign In";
        $data['seo_keywords']   = "Admin Sign In";
        $data['page_title'] = "Admin Sign In";
        $data['companies'] = SubCompany::all();
        return view('admin.auth.login', $data);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function username()
    {
        return 'username';
    }


    public function login(Request $request)
    {
        $this->validateLogin($request);
        session()->put('admin_username', $request->username);
        session()->put('admin_name', $request->name);

        $request->validate([
            'company' => 'required|integer|exists:sub_company,id',
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {

            $user = Admin::where('id', Auth::guard('admin')->user()->id)
                ->with(['company_and_role', 'company_and_role.company', 'company_and_role.role'])
                ->first();

            if ($user && $user->status) {
                $company_and_role = $user->company_and_role->where('company_id', $request->company)->first();
                $company = SubCompany::with('currency')->where('id', $request->company)->first();

                if (!$company_and_role || !$company) {
                    Auth::guard('admin')->logout();
                    $notify[] = ['error', 'Invalid Access!'];
                    return redirect()->route('admin.login')->withNotify($notify);
                }

                session()->put('user_info', [
                    "user_id" => $user->id,
                    "role_id" => $company_and_role->role_id,
                    "role" => $company_and_role->role->name,
                    "company_id" => $company_and_role->company_id,
                    "company_name" => @$company_and_role->company->name,
                    "company_display_name" => @$company_and_role->company->displayName,
                    "company_short_name" => @$company_and_role->company->shortName,
                    "fiscal_year_id" => @$company_and_role->company->fiscal_year->id,
                    "fiscal_year" => @$company_and_role->company->fiscal_year->description,
                    "currency_id" => $company->currency->id ?? 0,
                    "currency_name" => $company->currency->name ?? '',
                    "currency_code" => $company->currency->code ?? '',
                ]);
            } else {
                Auth::guard('admin')->logout();
                $notify[] = ['error', 'Invalid Access or Block User!'];
                return redirect()->route('admin.login')->withNotify($notify);
            }

            // return $this->setSessionData($request->company);
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    public function logout(Request $request)
    {
        $this->guard('admin')->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('/admin');
    }

    public function resetPassword()
    {
        $page_title = 'Account Recovery';
        return view('admin.reset', compact('page_title'));
    }

    private function setSessionData($company)
    {
        $user = Admin::where('id', Auth::guard('admin')->user()->id)
            ->with(['company_and_role', 'company_and_role.company', 'company_and_role.role'])
            ->first();

        if ($user) {
            $company_and_role = $user->company_and_role ?? null;

            if (!$company_and_role) {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login');
            }
        }

        return $user;
    }
}
