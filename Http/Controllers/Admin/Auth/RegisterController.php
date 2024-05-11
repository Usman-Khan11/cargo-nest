<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\GeneralSetting;
use App\Models\User;
use App\Models\UserLogin;
use App\Models\Customer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function referralRegister($reference)
    {
        $page_title = "Sign Up";
        session()->put('reference', $reference);
        $info = json_decode(json_encode(getIpInfo()), true);
        $country_code = @implode(',', $info['code']);

        return view('user.auth.register', compact('reference', 'page_title','country_code'));
    }


    public function showRegistrationForm(Request $request)
    {
        $info = json_decode(json_encode(getIpInfo()), true);

        // if ($request->ref) {
        //     $ref_user = User::where('username', $request->ref)->first();
        //     if ($ref_user == null) {
        //         $notify[] = ['error', 'Invalid Referral link.'];
        //         return redirect()->route('home')->withNotify($notify);
        //     }
        //      else {
        //         $notify[] = ['error', 'Invalid referral position'];
        //         return redirect()->route('home')->withNotify($notify);
        //     }
        //     $page_title = "Sign Up";

        //     return view('user.auth.register', compact('page_title', 'ref_user', 'country_code'));

        // }

        $ref_user = null;
        $page_title = "Sign Up";
        $general = GeneralSetting::first();
        return view('user.auth.register', compact('page_title', 'ref_user','general'));

    }




    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'company_name' => ['string', 'max:255'],
            'company_type' => ['string', 'max:255'],
            'phone' => ['string', 'max:255'],
            'cell' => ['string', 'max:255'],
            'fax' => ['string', 'max:255'],
            'email_1' => ['string', 'email', 'max:255'],
            'email_2' => ['string', 'email', 'max:255'],
            'email_3' => ['string', 'email', 'max:255'],
            'address' => ['string', 'max:255'],
            'city' => ['string', 'max:255'],
            'state' => ['string', 'max:255'],
            'zipcode' => ['string', 'max:255'],
            'country' => ['string', 'max:255'],
            'reference' => ['string', 'max:255'],
        ]);
    }

     public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $general = GeneralSetting::first();

        if ($general->secure_password) {
            $notify = $this->strongPassCheck($request->password);
            if ($notify) {
                return back()->withNotify($notify)->withInput($request->all());
            }
        }

        $exist = Customer::where('phone',$request->phone)->first();
        if ($exist) {
            $notify[] = ['error', 'Mobile number already exist'];
            return back()->withNotify($notify)->withInput();
        }

        $userCheck = User::where('username', $request->username)->first();

        if ($userCheck)
        {
            $notify[] = ['error', 'User Already exist.'];
            return back()->withNotify($notify);
        }

        if (isset($request->captcha)) {
            if (!captchaVerify($request->captcha, $request->captcha_secret)) {
                $notify[] = ['error', "Invalid Captcha"];
                return back()->withNotify($notify)->withInput();
            }
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return redirect()->route('user.home');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
        $customer = Customer::create([
            'fullname' => $data['name'],
            'company_name' => $data['company_name'],
            'company_type' => $data['company_type'],
            'phone' => $data['phone'],
            'cell' => $data['cell'],
            'fax' => $data['fax'],
            'email' => $data['email'],
            'email_1' => $data['email1'],
            'email_2' => $data['email2'],
            'email_3' => $data['email3'],
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zipcode' => $data['zipcode'],
            'country' => $data['country'],
            'reference' => $data['reference'],
            'user_id' => $user->id,

        ]); 

        $adminNotification = new AdminNotification();
        $adminNotification->user_id = $user->id;
        $adminNotification->title = 'New member registered';
        $adminNotification->click_url = "route('admin.users.detail',$user->id)";
        $adminNotification->save();

        //  //Login Log Create
        // $ip = $_SERVER["REMOTE_ADDR"];
        // $exist = UserLogin::where('user_ip',$ip)->first();
        // $userLogin = new UserLogin();

        // //Check exist or not
        // if ($exist) {
        //     $userLogin->longitude =  $exist->longitude;
        //     $userLogin->latitude =  $exist->latitude;
        //     $userLogin->location =  $exist->location;
        //     $userLogin->country_code = $exist->country_code;
        //     $userLogin->country =  $exist->country;
        // }else{
        //     $info = json_decode(json_encode(getIpInfo()), true);
        //     if($info)
        //     {
        //         $userLogin->longitude =  @implode(',',$info['long']);
        //         $userLogin->latitude =  @implode(',',$info['lat']);
        //         $userLogin->location =  @implode(',',$info['city']) . (" - ". @implode(',',$info['area']) ."- ") . @implode(',',$info['country']) . (" - ". @implode(',',$info['code']) . " ");
        //         $userLogin->country_code = @implode(',',$info['code']);
        //         $userLogin->country =  @implode(',', $info['country']);
        //     }
            
        // }

        // $userAgent = osBrowser();
        // $userLogin->user_id = $user->id;
        // $userLogin->user_ip =  $ip;

        // $userLogin->browser = @$userAgent['browser'];
        // $userLogin->os = @$userAgent['os_platform'];
        // $userLogin->save();

        return $user;
    }

    protected function strongPassCheck($password){
        $password = $password;
        $capital = '/[ABCDEFGHIJKLMNOPQRSTUVWXYZ]/';
        $capital = preg_match($capital,$password);
        $notify = null;
        if (!$capital) {
            $notify[] = ['error','Minimum 1 capital word is required'];
        }
        $number = '/[123456790]/';
        $number = preg_match($number,$password);
        if (!$number) {
            $notify[] = ['error','Minimum 1 number is required'];
        }
        $special = '/[`!@#$%^&*()_+\-=\[\]{};:"\\|,.<>\/?~\']/';
        $special = preg_match($special,$password);
        if (!$special) {
            $notify[] = ['error','Minimum 1 special character is required'];
        }
        return $notify;
    }
}
