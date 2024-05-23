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
use App\Http\Controllers\Admin\IncoTermController;
use App\Http\Controllers\Admin\VesselController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\VoyageController;
use App\Http\Controllers\Admin\ChargesController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\PackagesController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\PartyController;
use App\Http\Controllers\Admin\ManifestController;
use App\Http\Controllers\Admin\CroController;
use App\Http\Controllers\Admin\BlController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\SwitchblController;
use App\Http\Controllers\Admin\StuffingController;
use App\Http\Controllers\Admin\MilestoneController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ReceiptController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\LetterController;
use App\Http\Controllers\Admin\LetterlistController;
use App\Http\Controllers\Admin\LettertemplateController;
use App\Http\Controllers\Admin\LetterprocessController;
use App\Http\Controllers\Admin\QueryController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\AgentInvoiceController;
use App\Http\Controllers\Admin\AgentReceiptController;
use App\Http\Controllers\Admin\AgentPaymentRequisitionController;
use App\Http\Controllers\Admin\PaymentRequisitionController;
use App\Http\Controllers\Admin\ShippingInstructionController;

//    SE EXPORT REPORTS
use App\Http\Controllers\Admin\SeExportController;




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
                
                // COMMODITY ROUTES
                Route::get('inco_term',[IncoTermController::class ,'index'])->name('inco_term');
                Route::get('inco_term/create',[IncoTermController::class ,'create'])->name('inco_term.create');
                Route::get('inco_term/edit/{id}',[IncoTermController::class ,'edit'])->name('inco_term.edit');
                Route::get('inco_term/delete/{id}',[IncoTermController::class ,'delete'])->name('inco_term.delete');
                Route::post('inco_term/store',[IncoTermController::class ,'store'])->name('inco_term.store');
                Route::post('inco_term/update',[IncoTermController::class ,'update'])->name('inco_term.update');
                
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

                // EMPLOYEE ROUTES
                Route::get('employee',[EmployeeController::class ,'index'])->name('employee');
                Route::get('employee/create',[EmployeeController::class ,'create'])->name('employee.create');
                Route::get('employee/edit/{id}',[EmployeeController::class ,'edit'])->name('employee.edit');
                Route::get('employee/delete/{id}',[EmployeeController::class ,'delete'])->name('employee.delete');
                Route::post('employee/store',[EmployeeController::class ,'store'])->name('employee.store');
                Route::post('employee/update',[EmployeeController::class ,'update'])->name('employee.update');
                
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
                
                // SWITCH B/L ROUTES
                Route::get('switchbl',[SwitchblController::class ,'index'])->name('switchbl');
                Route::get('switchbl/create',[SwitchblController::class ,'create'])->name('switchbl.create');
                Route::get('switchbl/edit/{id}',[SwitchblController::class ,'edit'])->name('switchbl.edit');
                Route::get('switchbl/delete/{id}',[SwitchblController::class ,'delete'])->name('switchbl.delete');
                Route::post('switchbl/store',[SwitchblController::class ,'store'])->name('switchbl.store');
                Route::post('switchbl/update',[SwitchblController::class ,'update'])->name('switchbl.update');
                
                // STUFFING ROUTES
                Route::get('stuffing',[StuffingController::class ,'index'])->name('stuffing');
                Route::get('stuffing/create',[StuffingController::class ,'create'])->name('stuffing.create');
                Route::get('stuffing/edit/{id}',[StuffingController::class ,'edit'])->name('stuffing.edit');
                Route::get('stuffing/delete/{id}',[StuffingController::class ,'delete'])->name('stuffing.delete');
                Route::post('stuffing/store',[StuffingController::class ,'store'])->name('stuffing.store');
                Route::post('stuffing/update',[StuffingController::class ,'update'])->name('stuffing.update');
                
                // MILESTONE ROUTES
                Route::get('milestone',[MilestoneController::class ,'index'])->name('milestone');
                Route::get('milestone/create',[MilestoneController::class ,'create'])->name('milestone.create');
                Route::get('milestone/edit/{id}',[MilestoneController::class ,'edit'])->name('milestone.edit');
                Route::get('milestone/delete/{id}',[MilestoneController::class ,'delete'])->name('milestone.delete');
                Route::post('milestone/store',[MilestoneController::class ,'store'])->name('milestone.store');
                Route::post('milestone/update',[MilestoneController::class ,'update'])->name('milestone.update');
                
                // INVOICE ROUTES
                Route::get('invoice',[InvoiceController::class ,'index'])->name('invoice');
                Route::get('invoice/create',[InvoiceController::class ,'create'])->name('invoice.create');
                Route::get('invoice/edit/{id}',[InvoiceController::class ,'edit'])->name('invoice.edit');
                Route::get('invoice/delete/{id}',[InvoiceController::class ,'delete'])->name('invoice.delete');
                Route::post('invoice/store',[InvoiceController::class ,'store'])->name('invoice.store');
                Route::post('invoice/update',[InvoiceController::class ,'update'])->name('invoice.update');
                
                // RECEIPT ROUTES
                Route::get('receipt',[ReceiptController::class ,'index'])->name('receipt');
                Route::get('receipt/create',[ReceiptController::class ,'create'])->name('receipt.create');
                Route::get('receipt/edit/{id}',[ReceiptController::class ,'edit'])->name('receipt.edit');
                Route::get('receipt/delete/{id}',[ReceiptController::class ,'delete'])->name('receipt.delete');
                Route::post('receipt/store',[ReceiptController::class ,'store'])->name('receipt.store');
                Route::post('receipt/update',[ReceiptController::class ,'update'])->name('receipt.update');
                
                // BILL ROUTES
                Route::get('bill',[BillController::class ,'index'])->name('bill');
                Route::get('bill/create',[BillController::class ,'create'])->name('bill.create');
                Route::get('bill/edit/{id}',[BillController::class ,'edit'])->name('bill.edit');
                Route::get('bill/delete/{id}',[BillController::class ,'delete'])->name('bill.delete');
                Route::post('bill/store',[BillController::class ,'store'])->name('bill.store');
                Route::post('bill/update',[BillController::class ,'update'])->name('bill.update');
                
                // LETTERS ROUTES
                Route::get('letter',[LetterController::class ,'index'])->name('letter');
                Route::get('letter/create',[LetterController::class ,'create'])->name('letter.create');
                Route::get('letter/edit/{id}',[LetterController::class ,'edit'])->name('letter.edit');
                Route::get('letter/delete/{id}',[LetterController::class ,'delete'])->name('letter.delete');
                Route::post('letter/store',[LetterController::class ,'store'])->name('letter.store');
                Route::post('letter/update',[LetterController::class ,'update'])->name('letter.update');
                
                // LETTERS LIST ROUTES
                Route::get('letterlist',[LetterlistController::class ,'index'])->name('letterlist');
                Route::get('letterlist/create',[LetterlistController::class ,'create'])->name('letterlist.create');
                Route::get('letterlist/edit/{id}',[LetterlistController::class ,'edit'])->name('letterlist.edit');
                Route::get('letterlist/delete/{id}',[LetterlistController::class ,'delete'])->name('letterlist.delete');
                Route::post('letterlist/store',[LetterlistController::class ,'store'])->name('letterlist.store');
                Route::post('letterlist/update',[LetterlistController::class ,'update'])->name('letterlist.update');
                
                // LETTERS TEMPLATES ROUTES
                Route::get('lettertemplate',[LettertemplateController::class ,'index'])->name('lettertemplate');
                Route::get('lettertemplate/create',[LettertemplateController::class ,'create'])->name('lettertemplate.create');
                Route::get('lettertemplate/edit/{id}',[LettertemplateController::class ,'edit'])->name('lettertemplate.edit');
                Route::get('lettertemplate/delete/{id}',[LettertemplateController::class ,'delete'])->name('lettertemplate.delete');
                Route::post('lettertemplate/store',[LettertemplateController::class ,'store'])->name('lettertemplate.store');
                Route::post('lettertemplate/update',[LettertemplateController::class ,'update'])->name('lettertemplate.update');
                
                // LETTERS PROCESS ROUTES
                Route::get('letterprocess',[LetterprocessController::class ,'index'])->name('letterprocess');
                Route::get('letterprocess/create',[LetterprocessController::class ,'create'])->name('letterprocess.create');
                Route::get('letterprocess/edit/{id}',[LetterprocessController::class ,'edit'])->name('letterprocess.edit');
                Route::get('letterprocess/delete/{id}',[LetterprocessController::class ,'delete'])->name('letterprocess.delete');
                Route::post('letterprocess/store',[LetterprocessController::class ,'store'])->name('letterprocess.store');
                Route::post('letterprocess/update',[LetterprocessController::class ,'update'])->name('letterprocess.update');
                
                // QUERY ROUTES
                Route::get('query',[QueryController::class ,'index'])->name('query');
                Route::get('query/create',[QueryController::class ,'create'])->name('query.create');
                Route::get('query/edit/{id}',[QueryController::class ,'edit'])->name('query.edit');
                Route::get('query/delete/{id}',[QueryController::class ,'delete'])->name('query.delete');
                Route::post('query/store',[QueryController::class ,'store'])->name('query.store');
                Route::post('query/update',[QueryController::class ,'update'])->name('query.update');
                
                // PAYMENT ROUTES
                Route::get('payment',[PaymentController::class ,'index'])->name('payment');
                Route::get('payment/create',[PaymentController::class ,'create'])->name('payment.create');
                Route::get('payment/edit/{id}',[PaymentController::class ,'edit'])->name('payment.edit');
                Route::get('payment/delete/{id}',[PaymentController::class ,'delete'])->name('payment.delete');
                Route::post('payment/store',[PaymentController::class ,'store'])->name('payment.store');
                Route::post('payment/update',[PaymentController::class ,'update'])->name('payment.update');
                
                // AGENT INVOICE ROUTES
                Route::get('agent_invoice',[AgentInvoiceController::class ,'index'])->name('agent_invoice');
                Route::get('agent_invoice/create',[AgentInvoiceController::class ,'create'])->name('agent_invoice.create');
                Route::get('agent_invoice/edit/{id}',[AgentInvoiceController::class ,'edit'])->name('agent_invoice.edit');
                Route::get('agent_invoice/delete/{id}',[AgentInvoiceController::class ,'delete'])->name('agent_invoice.delete');
                Route::post('agent_invoice/store',[AgentInvoiceController::class ,'store'])->name('agent_invoice.store');
                Route::post('agent_invoice/update',[AgentInvoiceController::class ,'update'])->name('agent_invoice.update');
                
                // AGENT RECEIPT ROUTES
                Route::get('agent_receipt',[AgentReceiptController::class ,'index'])->name('agent_receipt');
                Route::get('agent_receipt/create',[AgentReceiptController::class ,'create'])->name('agent_receipt.create');
                Route::get('agent_receipt/edit/{id}',[AgentReceiptController::class ,'edit'])->name('agent_receipt.edit');
                Route::get('agent_receipt/delete/{id}',[AgentReceiptController::class ,'delete'])->name('agent_receipt.delete');
                Route::post('agent_receipt/store',[AgentReceiptController::class ,'store'])->name('agent_receipt.store');
                Route::post('agent_receipt/update',[AgentReceiptController::class ,'update'])->name('agent_receipt.update');
                
                // AGENT PAYMENT REQUISITION ROUTES
                Route::get('agent_payment_requisition',[AgentPaymentRequisitionController::class ,'index'])->name('agent_payment_requisition');
                Route::get('agent_payment_requisition/create',[AgentPaymentRequisitionController::class ,'create'])->name('agent_payment_requisition.create');
                Route::get('agent_payment_requisition/edit/{id}',[AgentPaymentRequisitionController::class ,'edit'])->name('agent_payment_requisition.edit');
                Route::get('agent_payment_requisition/delete/{id}',[AgentPaymentRequisitionController::class ,'delete'])->name('agent_payment_requisition.delete');
                Route::post('agent_payment_requisition/store',[AgentPaymentRequisitionController::class ,'store'])->name('agent_payment_requisition.store');
                Route::post('agent_payment_requisition/update',[AgentPaymentRequisitionController::class ,'update'])->name('agent_payment_requisition.update');
                
                // PAYMENT REQUISITION ROUTES
                Route::get('payment_requisition',[PaymentRequisitionController::class ,'index'])->name('payment_requisition');
                Route::get('payment_requisition/create',[PaymentRequisitionController::class ,'create'])->name('payment_requisition.create');
                Route::get('payment_requisition/edit/{id}',[PaymentRequisitionController::class ,'edit'])->name('payment_requisition.edit');
                Route::get('payment_requisition/delete/{id}',[PaymentRequisitionController::class ,'delete'])->name('payment_requisition.delete');
                Route::post('payment_requisition/store',[PaymentRequisitionController::class ,'store'])->name('payment_requisition.store');
                Route::post('payment_requisition/update',[PaymentRequisitionController::class ,'update'])->name('payment_requisition.update');
                
                //  SHIPPING INSTRUCTION
                Route::get('shipping_instruction',[ShippingInstructionController::class ,'index'])->name('shipping_instruction');
                Route::get('shipping_instruction/create',[ShippingInstructionController::class ,'create'])->name('shipping_instruction.create');
                Route::get('shipping_instruction/edit/{id}',[ShippingInstructionController::class ,'edit'])->name('shipping_instruction.edit');
                Route::get('shipping_instruction/delete/{id}',[ShippingInstructionController::class ,'delete'])->name('shipping_instruction.delete');
                Route::post('shipping_instruction/store',[ShippingInstructionController::class ,'store'])->name('shipping_instruction.store');
                Route::post('shipping_instruction/update',[ShippingInstructionController::class ,'update'])->name('shipping_instruction.update');

                //  SE EXPORT REPORTS
                Route::get('job_balancing',[SeExportController::class ,'index'])->name('job_balancing');
                Route::get('job_list',[SeExportController::class ,'joblist'])->name('job_list');
                Route::get('job_wise_cont_list',[SeExportController::class ,'jobwisecontainerlist'])->name('job_wise_cont_list');
                Route::get('charges_wise_job_report',[SeExportController::class ,'chargeswisejobreport'])->name('charges_wise_job_report');
                Route::get('loading_list',[SeExportController::class ,'loadinglist'])->name('loading_list');
                Route::get('job_statistics',[SeExportController::class ,'jobstatistics'])->name('job_statistics');   
                Route::get('booking_list',[SeExportController::class ,'bookinglist'])->name('booking_list');   
                Route::get('bl_release_status',[SeExportController::class ,'blreleasestatus'])->name('bl_release_status');   
                Route::get('debit_credit',[SeExportController::class ,'debitcredit'])->name('debit_credit');   
                Route::get('cargo_movement',[SeExportController::class ,'cargomovement'])->name('cargo_movement');   
                Route::get('job_profit_loss',[SeExportController::class ,'jobprofitloss'])->name('job_profit_loss');    
           
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

