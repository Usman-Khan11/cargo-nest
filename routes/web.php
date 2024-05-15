<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\MaintainanceController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\AuthorizationController;
use App\Http\Controllers\UserController;


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\QuotationController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\CommodityController;
use App\Http\Controllers\Admin\VesselController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\VoyageController;
use App\Http\Controllers\Admin\ChargesController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\PackagesController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\PartyController;
use App\Http\Controllers\Admin\ManifestController;
use App\Http\Controllers\Admin\CroController;
use App\Http\Controllers\Admin\BlController;
use App\Http\Controllers\Admin\JobController;


Route::get('/clear', function(){
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('index');

/*
|--------------------------------------------------------------------------
| Start Admin Area
|--------------------------------------------------------------------------
*/

Route::namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
            Route::namespace('Auth')->group(function () 
            {
                Route::get('/', [AdminLoginController::class ,'showLoginForm'])->name('login');
                Route::post('/', [AdminLoginController::class ,'login'])->name('login');
                Route::get('logout', [AdminLoginController::class ,'logout'])->name('logout');
                // Admin Password Reset
                Route::get('password/reset', [ForgotPasswordController::class ,'showLinkRequestForm'])->name('password.reset');
                Route::post('password/reset', [ForgotPasswordController::class ,'sendResetLinkEmail']);
                Route::post('password/verify-code', [ForgotPasswordController::class ,'verifyCode'])->name('password.verify-code');
                Route::get('password/reset/{token}', [ResetPasswordController::class , 'showResetForm'])->name('password.change-link');
                Route::post('password/reset/change', [ResetPasswordController::class , 'reset'])->name('password.change');
            });

        Route::middleware('admin')->group(function () 
            {
                Route::get('dashboard', [AdminController::class ,'dashboard'])->name('dashboard');
                Route::get('profile', [AdminController::class ,'profile'])->name('profile');
                Route::post('profile', [AdminController::class ,'profileUpdate'])->name('profile.update');
                Route::get('password', [AdminController::class ,'password'])->name('password');
                Route::post('password', [AdminController::class ,'passwordUpdate'])->name('password.update');
                
                Route::get('general-setting',[AdminController::class ,'generalSetting'])->name('general_setting');
                Route::post('general-setting',[AdminController::class ,'saveGeneralSetting'])->name('save_general_setting');
                
                // GROUPS ROUTES
                Route::get('groups',[GroupController::class ,'index'])->name('group');
                Route::get('group/create',[GroupController::class ,'create'])->name('group.create');
                Route::get('group/edit/{id}',[GroupController::class ,'edit'])->name('group.edit');
                Route::get('group/delete/{id}',[GroupController::class ,'delete'])->name('group.delete');
                Route::post('group/store',[GroupController::class ,'store'])->name('group.store');
                Route::post('group/update',[GroupController::class ,'update'])->name('group.update');
                
                // CUSTOMER ROUTES
                Route::get('customers',[CustomerController::class ,'index'])->name('customer');
                Route::get('customer/create',[CustomerController::class ,'create'])->name('customer.create');
                Route::get('customer/edit/{id}',[CustomerController::class ,'edit'])->name('customer.edit');
                Route::get('customer/delete/{id}',[CustomerController::class ,'delete'])->name('customer.delete');
                Route::post('customer/store',[CustomerController::class ,'store'])->name('customer.store');
                Route::post('customer/update',[CustomerController::class ,'update'])->name('customer.update');
                
                // QUOTATION ROUTES
                Route::get('quotations',[QuotationController::class ,'index'])->name('quotation');
                Route::get('quotation/create',[QuotationController::class ,'create'])->name('quotation.create');
                Route::get('quotation/edit/{id}',[QuotationController::class ,'edit'])->name('quotation.edit');
                Route::get('quotation/delete/{id}',[QuotationController::class ,'delete'])->name('quotation.delete');
                Route::post('quotation/store',[QuotationController::class ,'store'])->name('quotation.store');
                Route::post('quotation/update',[QuotationController::class ,'update'])->name('quotation.update');

                // STAFF ROUTES
                Route::get('staff',[StaffController::class ,'index'])->name('staff');
                Route::get('staff/create',[StaffController::class ,'create'])->name('staff.create');
                Route::get('staff/edit/{id}',[StaffController::class ,'edit'])->name('staff.edit');
                Route::get('staff/delete/{id}',[StaffController::class ,'delete'])->name('staff.delete');
                Route::post('staff/store',[StaffController::class ,'store'])->name('staff.store');
                Route::post('staff/update',[StaffController::class ,'update'])->name('staff.update');
                
                // COMMODITY ROUTES
                Route::get('commodity',[CommodityController::class ,'index'])->name('commodity');
                Route::get('commodity/create',[CommodityController::class ,'create'])->name('commodity.create');
                Route::get('commodity/edit/{id}',[CommodityController::class ,'edit'])->name('commodity.edit');
                Route::get('commodity/delete/{id}',[CommodityController::class ,'delete'])->name('commodity.delete');
                Route::post('commodity/store',[CommodityController::class ,'store'])->name('commodity.store');
                Route::post('commodity/update',[CommodityController::class ,'update'])->name('commodity.update');
                
                // VESSEL ROUTES
                Route::get('vessel',[VesselController::class ,'index'])->name('vessel');
                Route::get('vessel/create',[VesselController::class ,'create'])->name('vessel.create');
                Route::get('vessel/edit/{id}',[VesselController::class ,'edit'])->name('vessel.edit');
                Route::get('vessel/delete/{id}',[VesselController::class ,'delete'])->name('vessel.delete');
                Route::post('vessel/store',[VesselController::class ,'store'])->name('vessel.store');
                Route::post('vessel/update',[VesselController::class ,'update'])->name('vessel.update');
                
                // LOCATION ROUTES
                Route::get('location',[LocationController::class ,'index'])->name('location');
                Route::get('location/create',[LocationController::class ,'create'])->name('location.create');
                Route::get('location/edit/{id}',[LocationController::class ,'edit'])->name('location.edit');
                Route::get('location/delete/{id}',[LocationController::class ,'delete'])->name('location.delete');
                Route::post('location/store',[LocationController::class ,'store'])->name('location.store');
                Route::post('location/update',[LocationController::class ,'update'])->name('location.update');
                
                // VOYAGE ROUTES
                Route::get('voyage',[VoyageController::class ,'index'])->name('voyage');
                Route::get('voyage/create',[VoyageController::class ,'create'])->name('voyage.create');
                Route::get('voyage/edit/{id}',[VoyageController::class ,'edit'])->name('voyage.edit');
                Route::get('voyage/delete/{id}',[VoyageController::class ,'delete'])->name('voyage.delete');
                Route::post('voyage/store',[VoyageController::class ,'store'])->name('voyage.store');
                Route::post('voyage/update',[VoyageController::class ,'update'])->name('voyage.update');
                
                // CHARGES ROUTES
                Route::get('charges',[ChargesController::class ,'index'])->name('charges');
                Route::get('charges/create',[ChargesController::class ,'create'])->name('charges.create');
                Route::get('charges/edit/{id}',[ChargesController::class ,'edit'])->name('charges.edit');
                Route::get('charges/delete/{id}',[ChargesController::class ,'delete'])->name('charges.delete');
                Route::post('charges/store',[ChargesController::class ,'store'])->name('charges.store');
                Route::post('charges/update',[ChargesController::class ,'update'])->name('charges.update');
                
                // EQUIPMENT ROUTES
                Route::get('equipment',[EquipmentController::class ,'index'])->name('equipment');
                Route::get('equipment/create',[EquipmentController::class ,'create'])->name('equipment.create');
                Route::get('equipment/edit/{id}',[EquipmentController::class ,'edit'])->name('equipment.edit');
                Route::get('equipment/delete/{id}',[EquipmentController::class ,'delete'])->name('equipment.delete');
                Route::post('equipment/store',[EquipmentController::class ,'store'])->name('equipment.store');
                Route::post('equipment/update',[EquipmentController::class ,'update'])->name('equipment.update');
                
                // PACKAGES ROUTES
                Route::get('packages',[PackagesController::class ,'index'])->name('packages');
                Route::get('packages/create',[PackagesController::class ,'create'])->name('packages.create');
                Route::get('packages/edit/{id}',[PackagesController::class ,'edit'])->name('packages.edit');
                Route::get('packages/delete/{id}',[PackagesController::class ,'delete'])->name('packages.delete');
                Route::post('packages/store',[PackagesController::class ,'store'])->name('packages.store');
                Route::post('packages/update',[PackagesController::class ,'update'])->name('packages.update');
                
                // CURRENCY ROUTES
                Route::get('currency',[CurrencyController::class ,'index'])->name('currency');
                Route::get('currency/create',[CurrencyController::class ,'create'])->name('currency.create');
                Route::get('currency/edit/{id}',[CurrencyController::class ,'edit'])->name('currency.edit');
                Route::get('currency/delete/{id}',[CurrencyController::class ,'delete'])->name('currency.delete');
                Route::post('currency/store',[CurrencyController::class ,'store'])->name('currency.store');
                Route::post('currency/update',[CurrencyController::class ,'update'])->name('currency.update');

                // PARTY ROUTES
                Route::get('party',[PartyController::class ,'index'])->name('party');
                Route::get('party/create',[PartyController::class ,'create'])->name('party.create');
                Route::get('party/edit/{id}',[PartyController::class ,'edit'])->name('party.edit');
                Route::get('party/delete/{id}',[PartyController::class ,'delete'])->name('party.delete');
                Route::post('party/store',[PartyController::class ,'store'])->name('party.store');
                Route::post('party/update',[PartyController::class ,'update'])->name('party.update');
                
                // MANIFEST ROUTES
                Route::get('manifest',[ManifestController::class ,'index'])->name('manifest');
                Route::get('manifest/create',[ManifestController::class ,'create'])->name('manifest.create');
                Route::get('manifest/edit/{id}',[ManifestController::class ,'edit'])->name('manifest.edit');
                Route::get('manifest/delete/{id}',[ManifestController::class ,'delete'])->name('manifest.delete');
                Route::post('manifest/store',[ManifestController::class ,'store'])->name('manifest.store');
                Route::post('manifest/update',[ManifestController::class ,'update'])->name('manifest.update');
                
                // CRO ROUTES
                Route::get('cro',[CroController::class ,'index'])->name('cro');
                Route::get('cro/create',[CroController::class ,'create'])->name('cro.create');
                Route::get('cro/edit/{id}',[CroController::class ,'edit'])->name('cro.edit');
                Route::get('cro/delete/{id}',[CroController::class ,'delete'])->name('cro.delete');
                Route::post('cro/store',[CroController::class ,'store'])->name('cro.store');
                Route::post('cro/update',[CroController::class ,'update'])->name('cro.update');
                
                // B/L ROUTES
                Route::get('bl',[BlController::class ,'index'])->name('bl');
                Route::get('bl/create',[BlController::class ,'create'])->name('bl.create');
                Route::get('bl/edit/{id}',[BlController::class ,'edit'])->name('bl.edit');
                Route::get('bl/delete/{id}',[BlController::class ,'delete'])->name('bl.delete');
                Route::post('bl/store',[BlController::class ,'store'])->name('bl.store');
                Route::post('bl/update',[BlController::class ,'update'])->name('bl.update');
                
                // JOB ROUTES
                Route::get('job',[JobController::class ,'index'])->name('job');
                Route::get('job/create',[JobController::class ,'create'])->name('job.create');
                Route::get('job/edit/{id}',[JobController::class ,'edit'])->name('job.edit');
                Route::get('job/delete/{id}',[JobController::class ,'delete'])->name('job.delete');
                Route::post('job/store',[JobController::class ,'store'])->name('job.store');
                Route::post('job/update',[JobController::class ,'update'])->name('job.update');

            });

    });

/*
|--------------------------------------------------------------------------
| Start User Area
|--------------------------------------------------------------------------
*/

Route::name('user.')->group(function () {

    // Auth Work Start
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get(
        'register',
        [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('register');

    Route::get(
        'password/reset',
        [ForgotPasswordController::class , 'showLinkRequestForm']
    )->name('password.request');
    Route::post(
        'password/email',
        [ForgotPasswordController::class , 'sendResetLinkEmail']
    )->name('password.email');
    Route::get(
        'password/code-verify',
        [ForgotPasswordController::class , 'codeVerify']
    )->name('password.code_verify');
    Route::post('password/reset', [ResetPasswordController::class , 'reset'])->name(
        'password.update'
    );
    Route::get(
        'password/reset/{token}',
        [ResetPasswordController::class , 'showResetForm']
    )->name('password.reset');
    Route::post(
        'password/verify-code',
        [ForgotPasswordController::class , 'verifyCode']
    )->name('password.verify-code');

    //Auth Work Ends
});

Route::name('user.')->prefix('user')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('authorization', [AuthorizationController::class , 'authorizeForm'])->name('authorization');
        Route::get('resend-verify', [AuthorizationController::class , 'sendVerifyCode'])->name('send_verify_code');
        Route::post('verify-email', [AuthorizationController::class , 'emailVerification'])->name('verify_email');
        Route::post('verify-sms', [AuthorizationController::class , 'smsVerification'])->name('verify_sms');
        Route::post('verify-g2fa', [AuthorizationController::class , 'g2faVerification'])->name('go2fa.verify');

        Route::middleware(['checkStatus'])->group(function () {
            Route::get('dashboard', [UserController::class , 'home'])->name('home');

            Route::get('profile-setting', [UserController::class , 'profile'])->name('profile-setting');
            Route::post('profile-setting', [UserController::class , 'submitProfile']);
            Route::get('change-password', [UserController::class , 'changePassword'])->name('change-password');
            Route::post('change-password', [UserController::class , 'submitPassword']);

            //2FA
            Route::get('twofactor', [UserController::class , 'show2faForm'])->name('twofactor');
            Route::post('twofactor/enable', [UserController::class , 'create2fa'])->name('twofactor.enable');
            Route::post('twofactor/disable', [UserController::class , 'disable2fa'])->name('twofactor.disable');
            Route::get('login/history', [UserController::class , 'userLoginHistory'])->name('login.history');
        });
    });
});

