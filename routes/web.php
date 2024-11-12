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
use App\Http\Controllers\Admin\PartyLocationController;
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
use App\Http\Controllers\Admin\CtrkController;
use App\Http\Controllers\Admin\LoadingProgramController;
use App\Http\Controllers\Admin\SubCompanyController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\NavController;


//    SE EXPORT REPORTS
use App\Http\Controllers\Admin\SeExportController;


use App\Http\Controllers\Admin\ChartAccountController;
use App\Http\Controllers\Admin\VoucherPropertiesController;
use App\Http\Controllers\Admin\OpeningBalanceController;
use App\Http\Controllers\Admin\AccountIntegrateController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Admin\GlInvoiceController;
use App\Http\Controllers\Admin\GlBillController;
use App\Http\Controllers\Admin\BankReconcilationController;
use App\Http\Controllers\Admin\GlBudgetController;
use App\Http\Controllers\Admin\CashDenominationRecordController;
use App\Http\Controllers\Admin\ChequeBookStockController;
use App\Http\Controllers\Admin\ChequeOpeningController;
use App\Http\Controllers\Admin\ReconsilationDateSetupController;


use App\Http\Controllers\Admin\ArrivalNoticeController;
use App\Http\Controllers\Admin\EpassWebocController;
use App\Http\Controllers\Admin\PreAlertController;
use App\Http\Controllers\Admin\DeliveryOrderController;
use App\Http\Controllers\Admin\AdvanceDetensionController;
use App\Http\Controllers\Admin\AutoDetensionController;
use App\Http\Controllers\Admin\DetensionSummaryController;
use App\Http\Controllers\Admin\EquipmentInvoiceProcessController;
use App\Http\Controllers\Admin\RefundRequisitionController;
use App\Http\Controllers\Admin\RefundRequisitionReportController;
use App\Http\Controllers\Admin\SecurityDepositeActivityReportController;
use App\Http\Controllers\Admin\SecurityDepositeStatusReportController;
use App\Http\Controllers\Admin\SecurityRefundUtilityController;
use App\Http\Controllers\Admin\SiBlAmendmentController;
use App\Http\Controllers\Admin\SiEquipmentInvoiceOtherController;
use App\Http\Controllers\Admin\TerminalStockRequiremnetController;
use App\Http\Controllers\Admin\BulkDeleteContainerActivityController;
use App\Http\Controllers\Admin\ContainerActivityController;
use App\Http\Controllers\Admin\GuaranteeFillingAnellationController;
use App\Http\Controllers\Admin\GuaranteeLetterListController;
use App\Http\Controllers\Admin\GuaranteeLetterProcessController;
use App\Http\Controllers\Admin\GuaranteeLetterTemplateController;
use App\Http\Controllers\Admin\GuaranteeLetterController;
use App\Http\Controllers\Admin\SecurityDepositeController;
use App\Http\Controllers\Admin\VesselArrivalDepartureReportController;
use App\Http\Controllers\Admin\CrtEdiController;
use App\Http\Controllers\Admin\PrincipalManualSoaController;
use App\Http\Controllers\Admin\PrincipalSoaController;
use App\Http\Controllers\Admin\PrincipalReceiptPaymentController;
use App\Http\Controllers\Admin\SystemPolicyController;

Route::get('/clear', function () {
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
        Route::namespace('Auth')->group(function () {
            Route::get('/', [AdminLoginController::class, 'showLoginForm'])->name('login');
            Route::post('/', [AdminLoginController::class, 'login'])->name('login');
            Route::get('logout', [AdminLoginController::class, 'logout'])->name('logout');
            // Admin Password Reset
            Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.reset');
            Route::post('password/reset', [ForgotPasswordController::class, 'sendResetLinkEmail']);
            Route::post('password/verify-code', [ForgotPasswordController::class, 'verifyCode'])->name('password.verify-code');
            Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.change-link');
            Route::post('password/reset/change', [ResetPasswordController::class, 'reset'])->name('password.change');
        });

        Route::middleware('admin')->group(function () {
            Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
            Route::get('profile', [AdminController::class, 'profile'])->name('profile');
            Route::post('profile', [AdminController::class, 'profileUpdate'])->name('profile.update');
            Route::get('password', [AdminController::class, 'password'])->name('password');
            Route::post('password', [AdminController::class, 'passwordUpdate'])->name('password.update');

            Route::get('general-setting', [AdminController::class, 'generalSetting'])->name('general_setting');
            Route::post('general-setting', [AdminController::class, 'saveGeneralSetting'])->name('save_general_setting');

            // GROUPS ROUTES
            Route::get('groups', [GroupController::class, 'index'])->name('group');
            Route::get('group/create', [GroupController::class, 'create'])->name('group.create');
            Route::get('group/edit/{id}', [GroupController::class, 'edit'])->name('group.edit');
            Route::get('group/delete/{id}', [GroupController::class, 'delete'])->name('group.delete');
            Route::post('group/store', [GroupController::class, 'store'])->name('group.store');
            Route::post('group/update', [GroupController::class, 'update'])->name('group.update');

            // CUSTOMER ROUTES
            Route::get('customers', [CustomerController::class, 'index'])->name('customer');
            Route::get('customer/create', [CustomerController::class, 'create'])->name('customer.create');
            Route::get('customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
            Route::get('customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
            Route::post('customer/store', [CustomerController::class, 'store'])->name('customer.store');
            Route::post('customer/update', [CustomerController::class, 'update'])->name('customer.update');

            // QUOTATION ROUTES

            Route::get('quotations', [QuotationController::class, 'index'])->name('quotation');
            Route::get('quotation/create', [QuotationController::class, 'create'])->name('quotation.create');
            Route::get('quotation/edit/{id}', [QuotationController::class, 'edit'])->name('quotation.edit');
            Route::get('quotation/delete/{id}', [QuotationController::class, 'delete'])->name('quotation.delete');
            Route::post('quotation/store', [QuotationController::class, 'store'])->name('quotation.store');
            Route::post('quotation/update', [QuotationController::class, 'update'])->name('quotation.update');
            Route::post('quotation/get', [QuotationController::class, 'get_data'])->name('quotation.get');
            Route::post('quotation/get_voyage', [QuotationController::class, 'get_voy'])->name('quotation.get_voyage');

            // STAFF ROUTES
            Route::get('staff', [StaffController::class, 'index'])->name('staff');
            Route::get('staff/create', [StaffController::class, 'create'])->name('staff.create');
            Route::get('staff/edit/{id}', [StaffController::class, 'edit'])->name('staff.edit');
            Route::get('staff/delete/{id}', [StaffController::class, 'delete'])->name('staff.delete');
            Route::post('staff/store', [StaffController::class, 'store'])->name('staff.store');
            Route::post('staff/update', [StaffController::class, 'update'])->name('staff.update');

            // COMMODITY ROUTES
            Route::get('commodity', [CommodityController::class, 'index'])->name('commodity');
            Route::get('commodity/create', [CommodityController::class, 'create'])->name('commodity.create');
            Route::get('commodity/edit/{id}', [CommodityController::class, 'edit'])->name('commodity.edit');
            Route::get('commodity/delete/{id}', [CommodityController::class, 'delete'])->name('commodity.delete');
            Route::post('commodity/store', [CommodityController::class, 'store'])->name('commodity.store');
            Route::post('commodity/update', [CommodityController::class, 'update'])->name('commodity.update');
            Route::post('commodity/get', [CommodityController::class, 'get_data'])->name('commodity.get');

            // INCO TERM ROUTES
            Route::get('inco_term', [IncoTermController::class, 'index'])->name('inco_term');
            Route::get('inco_term/create', [IncoTermController::class, 'create'])->name('inco_term.create');
            Route::get('inco_term/edit/{id}', [IncoTermController::class, 'edit'])->name('inco_term.edit');
            Route::get('inco_term/delete/{id}', [IncoTermController::class, 'delete'])->name('inco_term.delete');
            Route::post('inco_term/store', [IncoTermController::class, 'store'])->name('inco_term.store');
            Route::post('inco_term/update', [IncoTermController::class, 'update'])->name('inco_term.update');
            Route::post('inco_term/get', [IncoTermController::class, 'get_data'])->name('inco_term.get');

            // VESSEL ROUTES
            Route::get('vessel', [VesselController::class, 'index'])->name('vessel');
            Route::get('vessel/create', [VesselController::class, 'create'])->name('vessel.create');
            Route::get('vessel/edit/{id}', [VesselController::class, 'edit'])->name('vessel.edit');
            Route::get('vessel/delete/{id}', [VesselController::class, 'delete'])->name('vessel.delete');
            Route::post('vessel/store', [VesselController::class, 'store'])->name('vessel.store');
            Route::post('vessel/update', [VesselController::class, 'update'])->name('vessel.update');
            Route::post('vessel/import', [VesselController::class, 'bulkUpload'])->name('vessel.import');
            Route::post('vessel/get', [VesselController::class, 'get_data'])->name('vessel.get');

            // LOCATION ROUTES
            Route::get('location', [LocationController::class, 'index'])->name('location');
            Route::get('location/create', [LocationController::class, 'create'])->name('location.create');
            Route::get('location/edit/{id}', [LocationController::class, 'edit'])->name('location.edit');
            Route::get('location/delete/{id}', [LocationController::class, 'delete'])->name('location.delete');
            Route::post('location/store', [LocationController::class, 'store'])->name('location.store');
            Route::post('location/update', [LocationController::class, 'update'])->name('location.update');
            Route::post('location/get', [LocationController::class, 'get_data'])->name('location.get');
            Route::post('location/import', [LocationController::class, 'bulkUpload'])->name('location.import');

            // VOYAGE ROUTES
            Route::get('voyage', [VoyageController::class, 'index'])->name('voyage');
            Route::get('voyage/create', [VoyageController::class, 'create'])->name('voyage.create');
            Route::get('voyage/edit/{id}', [VoyageController::class, 'edit'])->name('voyage.edit');
            Route::get('voyage/delete/{id}', [VoyageController::class, 'delete'])->name('voyage.delete');
            Route::post('voyage/store', [VoyageController::class, 'store'])->name('voyage.store');
            Route::post('voyage/update', [VoyageController::class, 'update'])->name('voyage.update');
            Route::post('voyage/get', [VoyageController::class, 'get_data'])->name('voyage.get');

            // CHARGES ROUTES
            Route::get('charges', [ChargesController::class, 'index'])->name('charges');
            Route::get('charges/create', [ChargesController::class, 'create'])->name('charges.create');
            Route::get('charges/edit/{id}', [ChargesController::class, 'edit'])->name('charges.edit');
            Route::get('charges/delete/{id}', [ChargesController::class, 'delete'])->name('charges.delete');
            Route::post('charges/store', [ChargesController::class, 'store'])->name('charges.store');
            Route::post('charges/update', [ChargesController::class, 'update'])->name('charges.update');
            Route::post('charges/get', [ChargesController::class, 'get_data'])->name('charges.get');

            // EQUIPMENT ROUTES
            Route::get('equipment', [EquipmentController::class, 'index'])->name('equipment');
            Route::get('equipment/create', [EquipmentController::class, 'create'])->name('equipment.create');
            Route::get('equipment/edit/{id}', [EquipmentController::class, 'edit'])->name('equipment.edit');
            Route::get('equipment/delete/{id}', [EquipmentController::class, 'delete'])->name('equipment.delete');
            Route::post('equipment/store', [EquipmentController::class, 'store'])->name('equipment.store');
            Route::post('equipment/update', [EquipmentController::class, 'update'])->name('equipment.update');
            Route::post('equipment/get', [EquipmentController::class, 'get_data'])->name('equipment.get');
            Route::post('equipment/import', [EquipmentController::class, 'bulkUpload'])->name('equipment.import');

            // PACKAGES ROUTES
            Route::get('packages', [PackagesController::class, 'index'])->name('packages');
            Route::get('packages/create', [PackagesController::class, 'create'])->name('packages.create');
            Route::get('packages/edit/{id}', [PackagesController::class, 'edit'])->name('packages.edit');
            Route::get('packages/delete/{id}', [PackagesController::class, 'delete'])->name('packages.delete');
            Route::post('packages/store', [PackagesController::class, 'store'])->name('packages.store');
            Route::post('packages/update', [PackagesController::class, 'update'])->name('packages.update');
            Route::post('packages/get', [PackagesController::class, 'get_data'])->name('packages.get');

            // CURRENCY ROUTES
            Route::get('currency', [CurrencyController::class, 'index'])->name('currency');
            Route::get('currency/create', [CurrencyController::class, 'create'])->name('currency.create');
            Route::get('currency/edit/{id}', [CurrencyController::class, 'edit'])->name('currency.edit');
            Route::get('currency/delete/{id}', [CurrencyController::class, 'delete'])->name('currency.delete');
            Route::post('currency/store', [CurrencyController::class, 'store'])->name('currency.store');
            Route::post('currency/update', [CurrencyController::class, 'update'])->name('currency.update');
            Route::post('currency/import', [CurrencyController::class, 'bulkUpload'])->name('currency.import');
            Route::post('currency/get', [CurrencyController::class, 'get_data'])->name('currency.get');

            // PARTY ROUTES
            Route::get('party', [PartyController::class, 'index'])->name('party');
            Route::get('party/create', [PartyController::class, 'create'])->name('party.create');
            Route::get('party/edit/{id}', [PartyController::class, 'edit'])->name('party.edit');
            Route::get('party/delete/{id}', [PartyController::class, 'delete'])->name('party.delete');
            Route::post('party/store', [PartyController::class, 'store'])->name('party.store');
            Route::post('party/update', [PartyController::class, 'update'])->name('party.update');
            Route::post('party/get', [PartyController::class, 'get_data'])->name('party.get');

            // PARTY LOCATION ROUTES
            Route::get('party_location', [PartyLocationController::class, 'index'])->name('party_location');
            Route::get('party_location/create', [PartyLocationController::class, 'create'])->name('party_location.create');
            Route::get('party_location/edit/{id}', [PartyLocationController::class, 'edit'])->name('party_location.edit');
            Route::get('party_location/delete/{id}', [PartyLocationController::class, 'delete'])->name('party_location.delete');
            Route::post('party_location/store', [PartyLocationController::class, 'store'])->name('party_location.store');
            Route::post('party_location/update', [PartyLocationController::class, 'update'])->name('party_location.update');
            Route::post('party_location/get', [PartyLocationController::class, 'get_data'])->name('party_location.get');

            // EMPLOYEE ROUTES
            Route::get('employee', [EmployeeController::class, 'index'])->name('employee');
            Route::get('employee/create', [EmployeeController::class, 'create'])->name('employee.create');
            Route::get('employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
            Route::get('employee/delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');
            Route::post('employee/store', [EmployeeController::class, 'store'])->name('employee.store');
            Route::post('employee/update', [EmployeeController::class, 'update'])->name('employee.update');
            Route::post('employee/get', [EmployeeController::class, 'get_data'])->name('employee.get');

            // SUB COMPANY ROUTES
            Route::get('sub_company', [SubCompanyController::class, 'index'])->name('sub_company');
            Route::get('sub_company/create', [SubCompanyController::class, 'create'])->name('sub_company.create');
            Route::get('sub_company/edit/{id}', [SubCompanyController::class, 'edit'])->name('sub_company.edit');
            Route::get('sub_company/delete/{id}', [SubCompanyController::class, 'delete'])->name('sub_company.delete');
            Route::post('sub_company/store', [SubCompanyController::class, 'store'])->name('sub_company.store');
            Route::post('sub_company/update', [SubCompanyController::class, 'update'])->name('sub_company.update');
            Route::post('sub_company/get', [SubCompanyController::class, 'get_data'])->name('sub_company.get');

            // MANIFEST ROUTES
            Route::get('manifest', [ManifestController::class, 'index'])->name('manifest');
            Route::get('manifest/create', [ManifestController::class, 'create'])->name('manifest.create');
            Route::get('manifest/edit/{id}', [ManifestController::class, 'edit'])->name('manifest.edit');
            Route::get('manifest/delete/{id}', [ManifestController::class, 'delete'])->name('manifest.delete');
            Route::post('manifest/store', [ManifestController::class, 'store'])->name('manifest.store');
            Route::post('manifest/update', [ManifestController::class, 'update'])->name('manifest.update');
            Route::post('manifest/get', [ManifestController::class, 'get_data'])->name('manifest.get');

            // CRO ROUTES
            Route::get('cro', [CroController::class, 'index'])->name('cro');
            Route::get('cro/create', [CroController::class, 'create'])->name('cro.create');
            Route::get('cro/edit/{id}', [CroController::class, 'edit'])->name('cro.edit');
            Route::get('cro/delete/{id}', [CroController::class, 'delete'])->name('cro.delete');
            Route::post('cro/store', [CroController::class, 'store'])->name('cro.store');
            Route::post('cro/update', [CroController::class, 'update'])->name('cro.update');
            Route::post('cro/get', [CroController::class, 'get_data'])->name('cro.get');

            // B/L ROUTES
            Route::get('bl', [BlController::class, 'index'])->name('bl');
            Route::get('bl/create', [BlController::class, 'create'])->name('bl.create');
            Route::get('bl/edit/{id}', [BlController::class, 'edit'])->name('bl.edit');
            Route::get('bl/delete/{id}', [BlController::class, 'delete'])->name('bl.delete');
            Route::post('bl/store', [BlController::class, 'store'])->name('bl.store');
            Route::post('bl/update', [BlController::class, 'update'])->name('bl.update');
            Route::post('bl/get', [BlController::class, 'get_data'])->name('bl.get');

            // JOB ROUTES
            Route::get('job', [JobController::class, 'index'])->name('job');
            Route::get('job/create', [JobController::class, 'create'])->name('job.create');
            Route::get('job/edit/{id}', [JobController::class, 'edit'])->name('job.edit');
            Route::get('job/delete/{id}', [JobController::class, 'delete'])->name('job.delete');
            Route::post('job/store', [JobController::class, 'store'])->name('job.store');
            Route::post('job/update', [JobController::class, 'update'])->name('job.update');
            Route::post('job/get', [JobController::class, 'get_data'])->name('job.get');
            Route::get('job/get_quot', [JobController::class, 'get_quot'])->name('job.get_quot');

            // SWITCH B/L ROUTES
            Route::get('switchbl', [SwitchblController::class, 'index'])->name('switchbl');
            Route::get('switchbl/create', [SwitchblController::class, 'create'])->name('switchbl.create');
            Route::get('switchbl/edit/{id}', [SwitchblController::class, 'edit'])->name('switchbl.edit');
            Route::get('switchbl/delete/{id}', [SwitchblController::class, 'delete'])->name('switchbl.delete');
            Route::post('switchbl/store', [SwitchblController::class, 'store'])->name('switchbl.store');
            Route::post('switchbl/update', [SwitchblController::class, 'update'])->name('switchbl.update');
            Route::post('switchbl/get', [SwitchblController::class, 'get_data'])->name('switchbl.get');

            // STUFFING ROUTES
            Route::get('stuffing', [StuffingController::class, 'index'])->name('stuffing');
            Route::get('stuffing/create', [StuffingController::class, 'create'])->name('stuffing.create');
            Route::get('stuffing/edit/{id}', [StuffingController::class, 'edit'])->name('stuffing.edit');
            Route::get('stuffing/delete/{id}', [StuffingController::class, 'delete'])->name('stuffing.delete');
            Route::post('stuffing/store', [StuffingController::class, 'store'])->name('stuffing.store');
            Route::post('stuffing/update', [StuffingController::class, 'update'])->name('stuffing.update');
            Route::post('stuffing/get', [StuffingController::class, 'get_data'])->name('stuffing.get');

            // MILESTONE ROUTES
            Route::get('milestone', [MilestoneController::class, 'index'])->name('milestone');
            Route::get('milestone/create', [MilestoneController::class, 'create'])->name('milestone.create');
            Route::get('milestone/edit/{id}', [MilestoneController::class, 'edit'])->name('milestone.edit');
            Route::get('milestone/delete/{id}', [MilestoneController::class, 'delete'])->name('milestone.delete');
            Route::post('milestone/store', [MilestoneController::class, 'store'])->name('milestone.store');
            Route::post('milestone/update', [MilestoneController::class, 'update'])->name('milestone.update');
            Route::post('milestone/get', [MilestoneController::class, 'get_data'])->name('milestone.get');

            // INVOICE ROUTES
            Route::get('invoice', [InvoiceController::class, 'index'])->name('invoice');
            Route::get('invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
            Route::get('invoice/edit/{id}', [InvoiceController::class, 'edit'])->name('invoice.edit');
            Route::get('invoice/delete/{id}', [InvoiceController::class, 'delete'])->name('invoice.delete');
            Route::post('invoice/store', [InvoiceController::class, 'store'])->name('invoice.store');
            Route::post('invoice/update', [InvoiceController::class, 'update'])->name('invoice.update');
            Route::post('invoice/get', [InvoiceController::class, 'get_data'])->name('invoice.get');

            // RECEIPT ROUTES
            Route::get('receipt', [ReceiptController::class, 'index'])->name('receipt');
            Route::get('receipt/create', [ReceiptController::class, 'create'])->name('receipt.create');
            Route::get('receipt/edit/{id}', [ReceiptController::class, 'edit'])->name('receipt.edit');
            Route::get('receipt/delete/{id}', [ReceiptController::class, 'delete'])->name('receipt.delete');
            Route::post('receipt/store', [ReceiptController::class, 'store'])->name('receipt.store');
            Route::post('receipt/update', [ReceiptController::class, 'update'])->name('receipt.update');
            Route::post('receipt/get', [ReceiptController::class, 'get_data'])->name('receipt.get');

            // BILL ROUTES
            Route::get('bill', [BillController::class, 'index'])->name('bill');
            Route::get('bill/create', [BillController::class, 'create'])->name('bill.create');
            Route::get('bill/edit/{id}', [BillController::class, 'edit'])->name('bill.edit');
            Route::get('bill/delete/{id}', [BillController::class, 'delete'])->name('bill.delete');
            Route::post('bill/store', [BillController::class, 'store'])->name('bill.store');
            Route::post('bill/update', [BillController::class, 'update'])->name('bill.update');
            Route::post('bill/get', [BillController::class, 'get_data'])->name('bill.get');

            // LETTERS ROUTES
            Route::get('letter', [LetterController::class, 'index'])->name('letter');
            Route::get('letter/create', [LetterController::class, 'create'])->name('letter.create');
            Route::get('letter/edit/{id}', [LetterController::class, 'edit'])->name('letter.edit');
            Route::get('letter/delete/{id}', [LetterController::class, 'delete'])->name('letter.delete');
            Route::post('letter/store', [LetterController::class, 'store'])->name('letter.store');
            Route::post('letter/update', [LetterController::class, 'update'])->name('letter.update');

            // LETTERS LIST ROUTES
            Route::get('letterlist', [LetterlistController::class, 'index'])->name('letterlist');
            Route::get('letterlist/create', [LetterlistController::class, 'create'])->name('letterlist.create');
            Route::get('letterlist/edit/{id}', [LetterlistController::class, 'edit'])->name('letterlist.edit');
            Route::get('letterlist/delete/{id}', [LetterlistController::class, 'delete'])->name('letterlist.delete');
            Route::post('letterlist/store', [LetterlistController::class, 'store'])->name('letterlist.store');
            Route::post('letterlist/update', [LetterlistController::class, 'update'])->name('letterlist.update');
            Route::post('letterlist/get', [LetterlistController::class, 'get_data'])->name('letterlist.get');

            // LETTERS TEMPLATES ROUTES
            Route::get('lettertemplate', [LettertemplateController::class, 'index'])->name('lettertemplate');
            Route::get('lettertemplate/create', [LettertemplateController::class, 'create'])->name('lettertemplate.create');
            Route::get('lettertemplate/edit/{id}', [LettertemplateController::class, 'edit'])->name('lettertemplate.edit');
            Route::get('lettertemplate/delete/{id}', [LettertemplateController::class, 'delete'])->name('lettertemplate.delete');
            Route::post('lettertemplate/store', [LettertemplateController::class, 'store'])->name('lettertemplate.store');
            Route::post('lettertemplate/update', [LettertemplateController::class, 'update'])->name('lettertemplate.update');
            Route::post('lettertemplate/get', [LettertemplateController::class, 'get_data'])->name('lettertemplate.get');

            // LETTERS PROCESS ROUTES
            Route::get('letterprocess', [LetterprocessController::class, 'index'])->name('letterprocess');
            Route::get('letterprocess/create', [LetterprocessController::class, 'create'])->name('letterprocess.create');
            Route::get('letterprocess/edit/{id}', [LetterprocessController::class, 'edit'])->name('letterprocess.edit');
            Route::get('letterprocess/delete/{id}', [LetterprocessController::class, 'delete'])->name('letterprocess.delete');
            Route::post('letterprocess/store', [LetterprocessController::class, 'store'])->name('letterprocess.store');
            Route::post('letterprocess/update', [LetterprocessController::class, 'update'])->name('letterprocess.update');

            // QUERY ROUTES
            Route::get('query', [QueryController::class, 'index'])->name('query');
            Route::get('query/create', [QueryController::class, 'create'])->name('query.create');
            Route::get('query/edit/{id}', [QueryController::class, 'edit'])->name('query.edit');
            Route::get('query/delete/{id}', [QueryController::class, 'delete'])->name('query.delete');
            Route::post('query/store', [QueryController::class, 'store'])->name('query.store');
            Route::post('query/update', [QueryController::class, 'update'])->name('query.update');
            Route::post('query/get', [QueryController::class, 'get_data'])->name('query.get');

            // PAYMENT ROUTES
            Route::get('payment', [PaymentController::class, 'index'])->name('payment');
            Route::get('payment/create', [PaymentController::class, 'create'])->name('payment.create');
            Route::get('payment/edit/{id}', [PaymentController::class, 'edit'])->name('payment.edit');
            Route::get('payment/delete/{id}', [PaymentController::class, 'delete'])->name('payment.delete');
            Route::post('payment/store', [PaymentController::class, 'store'])->name('payment.store');
            Route::post('payment/update', [PaymentController::class, 'update'])->name('payment.update');
            Route::post('payment/get', [PaymentController::class, 'get_data'])->name('payment.get');

            // AGENT INVOICE ROUTES
            Route::get('agent_invoice', [AgentInvoiceController::class, 'index'])->name('agent_invoice');
            Route::get('agent_invoice/create', [AgentInvoiceController::class, 'create'])->name('agent_invoice.create');
            Route::get('agent_invoice/edit/{id}', [AgentInvoiceController::class, 'edit'])->name('agent_invoice.edit');
            Route::get('agent_invoice/delete/{id}', [AgentInvoiceController::class, 'delete'])->name('agent_invoice.delete');
            Route::post('agent_invoice/store', [AgentInvoiceController::class, 'store'])->name('agent_invoice.store');
            Route::post('agent_invoice/update', [AgentInvoiceController::class, 'update'])->name('agent_invoice.update');
            Route::post('agent_invoice/get', [AgentInvoiceController::class, 'get_data'])->name('agent_invoice.get');

            // AGENT RECEIPT ROUTES
            Route::get('agent_receipt', [AgentReceiptController::class, 'index'])->name('agent_receipt');
            Route::get('agent_receipt/create', [AgentReceiptController::class, 'create'])->name('agent_receipt.create');
            Route::get('agent_receipt/edit/{id}', [AgentReceiptController::class, 'edit'])->name('agent_receipt.edit');
            Route::get('agent_receipt/delete/{id}', [AgentReceiptController::class, 'delete'])->name('agent_receipt.delete');
            Route::post('agent_receipt/store', [AgentReceiptController::class, 'store'])->name('agent_receipt.store');
            Route::post('agent_receipt/update', [AgentReceiptController::class, 'update'])->name('agent_receipt.update');

            // AGENT PAYMENT REQUISITION ROUTES
            Route::get('agent_payment_requisition', [AgentPaymentRequisitionController::class, 'index'])->name('agent_payment_requisition');
            Route::get('agent_payment_requisition/create', [AgentPaymentRequisitionController::class, 'create'])->name('agent_payment_requisition.create');
            Route::get('agent_payment_requisition/edit/{id}', [AgentPaymentRequisitionController::class, 'edit'])->name('agent_payment_requisition.edit');
            Route::get('agent_payment_requisition/delete/{id}', [AgentPaymentRequisitionController::class, 'delete'])->name('agent_payment_requisition.delete');
            Route::post('agent_payment_requisition/store', [AgentPaymentRequisitionController::class, 'store'])->name('agent_payment_requisition.store');
            Route::post('agent_payment_requisition/update', [AgentPaymentRequisitionController::class, 'update'])->name('agent_payment_requisition.update');
            Route::post('agent_payment_requisition/get', [AgentPaymentRequisitionController::class, 'get_data'])->name('agent_payment_requisition.get');

            // PAYMENT REQUISITION ROUTES
            Route::get('payment_requisition', [PaymentRequisitionController::class, 'index'])->name('payment_requisition');
            Route::get('payment_requisition/create', [PaymentRequisitionController::class, 'create'])->name('payment_requisition.create');
            Route::get('payment_requisition/edit/{id}', [PaymentRequisitionController::class, 'edit'])->name('payment_requisition.edit');
            Route::get('payment_requisition/delete/{id}', [PaymentRequisitionController::class, 'delete'])->name('payment_requisition.delete');
            Route::post('payment_requisition/store', [PaymentRequisitionController::class, 'store'])->name('payment_requisition.store');
            Route::post('payment_requisition/update', [PaymentRequisitionController::class, 'update'])->name('payment_requisition.update');
            Route::post('payment_requisition/get', [PaymentRequisitionController::class, 'get_data'])->name('payment_requisition.get');

            //  SHIPPING INSTRUCTION
            Route::get('shipping_instruction', [ShippingInstructionController::class, 'index'])->name('shipping_instruction');
            Route::get('shipping_instruction/create', [ShippingInstructionController::class, 'create'])->name('shipping_instruction.create');
            Route::get('shipping_instruction/edit/{id}', [ShippingInstructionController::class, 'edit'])->name('shipping_instruction.edit');
            Route::get('shipping_instruction/delete/{id}', [ShippingInstructionController::class, 'delete'])->name('shipping_instruction.delete');
            Route::post('shipping_instruction/store', [ShippingInstructionController::class, 'store'])->name('shipping_instruction.store');
            Route::post('shipping_instruction/update', [ShippingInstructionController::class, 'update'])->name('shipping_instruction.update');
            Route::post('shipping_instruction/get', [ShippingInstructionController::class, 'get_data'])->name('shipping_instruction.get');

            // CTRK ROUTES
            Route::get('ctrk', [CtrkController::class, 'index'])->name('ctrk');
            Route::get('ctrk/create', [CtrkController::class, 'create'])->name('ctrk.create');
            Route::get('ctrk/edit/{id}', [CtrkController::class, 'edit'])->name('ctrk.edit');
            Route::get('ctrk/delete/{id}', [CtrkController::class, 'delete'])->name('ctrk.delete');
            Route::post('ctrk/store', [CtrkController::class, 'store'])->name('ctrk.store');
            Route::post('ctrk/update', [CtrkController::class, 'update'])->name('ctrk.update');
            Route::post('ctrk/import', [CtrkController::class, 'bulkUpload'])->name('ctrk.import');
            Route::post('ctrk/get', [CtrkController::class, 'get_data'])->name('ctrk.get');

            // LOADING PROGRAM ROUTES
            Route::get('loading_program', [LoadingProgramController::class, 'index'])->name('loading_program');
            Route::get('loading_program/create', [LoadingProgramController::class, 'create'])->name('loading_program.create');
            Route::get('loading_program/edit/{id}', [LoadingProgramController::class, 'edit'])->name('loading_program.edit');
            Route::get('loading_program/delete/{id}', [LoadingProgramController::class, 'delete'])->name('loading_program.delete');
            Route::post('loading_program/store', [LoadingProgramController::class, 'store'])->name('loading_program.store');
            Route::post('loading_program/update', [LoadingProgramController::class, 'update'])->name('loading_program.update');
            Route::post('loading_program/get', [LoadingProgramController::class, 'get_data'])->name('loading_program.get');


            //  SE EXPORT REPORTS
            Route::get('job_balancing', [SeExportController::class, 'index'])->name('job_balancing');
            Route::get('job_list', [SeExportController::class, 'joblist'])->name('job_list');
            Route::get('job_wise_cont_list', [SeExportController::class, 'jobwisecontainerlist'])->name('job_wise_cont_list');
            Route::get('charges_wise_job_report', [SeExportController::class, 'chargeswisejobreport'])->name('charges_wise_job_report');
            Route::get('loading_list', [SeExportController::class, 'loadinglist'])->name('loading_list');
            Route::get('job_statistics', [SeExportController::class, 'jobstatistics'])->name('job_statistics');
            Route::get('booking_list', [SeExportController::class, 'bookinglist'])->name('booking_list');
            Route::get('bl_release_status', [SeExportController::class, 'blreleasestatus'])->name('bl_release_status');
            Route::get('debit_credit', [SeExportController::class, 'debitcredit'])->name('debit_credit');
            Route::get('cargo_movement', [SeExportController::class, 'cargomovement'])->name('cargo_movement');
            Route::get('job_profit_loss', [SeExportController::class, 'jobprofitloss'])->name('job_profit_loss');


            //  CHART OF ACCOUNT INSTRUCTION
            Route::get('system_policy', [SystemPolicyController::class, 'index'])->name('system_policy');
            Route::get('system_policy/create', [SystemPolicyController::class, 'create'])->name('system_policy.create');
            Route::get('system_policy/edit/{id}', [SystemPolicyController::class, 'edit'])->name('system_policy.edit');
            Route::get('system_policy/delete/{id}', [SystemPolicyController::class, 'delete'])->name('system_policy.delete');
            Route::post('system_policy/store', [SystemPolicyController::class, 'store'])->name('system_policy.store');
            Route::post('system_policy/update', [SystemPolicyController::class, 'update'])->name('system_policy.update');
            Route::post('system_policy/get', [SystemPolicyController::class, 'get_data'])->name('system_policy.get');



            //  CHART OF ACCOUNT INSTRUCTION
            Route::get('chart_account', [ChartAccountController::class, 'index'])->name('chart_account');
            Route::get('chart_account/create', [ChartAccountController::class, 'create'])->name('chart_account.create');
            Route::get('chart_account/edit/{id}', [ChartAccountController::class, 'edit'])->name('chart_account.edit');
            Route::get('chart_account/delete/{id}', [ChartAccountController::class, 'delete'])->name('chart_account.delete');
            Route::post('chart_account/store', [ChartAccountController::class, 'store'])->name('chart_account.store');
            Route::post('chart_account/update', [ChartAccountController::class, 'update'])->name('chart_account.update');
            Route::post('chart_account/get', [ChartAccountController::class, 'get_data'])->name('chart_account.get');
            Route::post('chart_account/movement', [ChartAccountController::class, 'movement'])->name('chart_account.movement');

            //  VOUCHER PROPERTIES INSTRUCTION
            Route::get('voucher_properties', [VoucherPropertiesController::class, 'index'])->name('voucher_properties');
            Route::get('voucher_properties/create', [VoucherPropertiesController::class, 'create'])->name('voucher_properties.create');
            Route::get('voucher_properties/edit/{id}', [VoucherPropertiesController::class, 'edit'])->name('voucher_properties.edit');
            Route::get('voucher_properties/delete/{id}', [VoucherPropertiesController::class, 'delete'])->name('voucher_properties.delete');
            Route::post('voucher_properties/store', [VoucherPropertiesController::class, 'store'])->name('voucher_properties.store');
            Route::post('voucher_properties/update', [VoucherPropertiesController::class, 'update'])->name('voucher_properties.update');

            //  OPENING BALANCE INSTRUCTION
            Route::get('opening_balance', [OpeningBalanceController::class, 'index'])->name('opening_balance');
            Route::get('opening_balance/create', [OpeningBalanceController::class, 'create'])->name('opening_balance.create');
            Route::get('opening_balance/edit/{id}', [OpeningBalanceController::class, 'edit'])->name('opening_balance.edit');
            Route::get('opening_balance/delete/{id}', [OpeningBalanceController::class, 'delete'])->name('opening_balance.delete');
            Route::post('opening_balance/store', [OpeningBalanceController::class, 'store'])->name('opening_balance.store');
            Route::post('opening_balance/update', [OpeningBalanceController::class, 'update'])->name('opening_balance.update');

            //  ACCOUNT INTEGRATION INSTRUCTION
            Route::get('account_integrate', [AccountIntegrateController::class, 'index'])->name('account_integrate');
            Route::get('account_integrate/create', [AccountIntegrateController::class, 'create'])->name('account_integrate.create');
            Route::get('account_integrate/edit/{id}', [AccountIntegrateController::class, 'edit'])->name('account_integrate.edit');
            Route::get('account_integrate/delete/{id}', [AccountIntegrateController::class, 'delete'])->name('account_integrate.delete');
            Route::post('account_integrate/store', [AccountIntegrateController::class, 'store'])->name('account_integrate.store');
            Route::post('account_integrate/update', [AccountIntegrateController::class, 'update'])->name('account_integrate.update');

            //  VOUCHER TRANSACTION
            Route::get('voucher', [VoucherController::class, 'index'])->name('voucher');
            Route::get('voucher/create', [VoucherController::class, 'create'])->name('voucher.create');
            Route::get('voucher/edit/{id}', [VoucherController::class, 'edit'])->name('voucher.edit');
            Route::get('voucher/delete/{id}', [VoucherController::class, 'delete'])->name('voucher.delete');
            Route::post('voucher/store', [VoucherController::class, 'store'])->name('voucher.store');
            Route::post('voucher/update', [VoucherController::class, 'update'])->name('voucher.update');

            //  GL INVOICE TRANSACTION
            Route::get('gl_invoice', [GlInvoiceController::class, 'index'])->name('gl_invoice');
            Route::get('gl_invoice/create', [GlInvoiceController::class, 'create'])->name('gl_invoice.create');
            Route::get('gl_invoice/edit/{id}', [GlInvoiceController::class, 'edit'])->name('gl_invoice.edit');
            Route::get('gl_invoice/delete/{id}', [GlInvoiceController::class, 'delete'])->name('gl_invoice.delete');
            Route::post('gl_invoice/store', [GlInvoiceController::class, 'store'])->name('gl_invoice.store');
            Route::post('gl_invoice/update', [GlInvoiceController::class, 'update'])->name('gl_invoice.update');

            //  GL BILL TRANSACTION
            Route::get('gl_bill', [GlBillController::class, 'index'])->name('gl_bill');
            Route::get('gl_bill/create', [GlBillController::class, 'create'])->name('gl_bill.create');
            Route::get('gl_bill/edit/{id}', [GlBillController::class, 'edit'])->name('gl_bill.edit');
            Route::get('gl_bill/delete/{id}', [GlBillController::class, 'delete'])->name('gl_bill.delete');
            Route::post('gl_bill/store', [GlBillController::class, 'store'])->name('gl_bill.store');
            Route::post('gl_bill/update', [GlBillController::class, 'update'])->name('gl_bill.update');

            //  GL BILL TRANSACTION
            Route::get('bank_reconcilation', [BankReconcilationController::class, 'index'])->name('bank_reconcilation');
            Route::get('bank_reconcilation/create', [BankReconcilationController::class, 'create'])->name('bank_reconcilation.create');
            Route::get('bank_reconcilation/edit/{id}', [BankReconcilationController::class, 'edit'])->name('bank_reconcilation.edit');
            Route::get('bank_reconcilation/delete/{id}', [BankReconcilationController::class, 'delete'])->name('bank_reconcilation.delete');
            Route::post('bank_reconcilation/store', [BankReconcilationController::class, 'store'])->name('bank_reconcilation.store');
            Route::post('bank_reconcilation/update', [BankReconcilationController::class, 'update'])->name('bank_reconcilation.update');

            //  GL BUDGET TRANSACTION
            Route::get('gl_budget', [GlBudgetController::class, 'index'])->name('gl_budget');
            Route::get('gl_budget/create', [GlBudgetController::class, 'create'])->name('gl_budget.create');
            Route::get('gl_budget/edit/{id}', [GlBudgetController::class, 'edit'])->name('gl_budget.edit');
            Route::get('gl_budget/delete/{id}', [GlBudgetController::class, 'delete'])->name('gl_budget.delete');
            Route::post('gl_budget/store', [GlBudgetController::class, 'store'])->name('gl_budget.store');
            Route::post('gl_budget/update', [GlBudgetController::class, 'update'])->name('gl_budget.update');

            //  CASH DENOMINATION RECORD TRANSACTION
            Route::get('cash_denomination_record', [CashDenominationRecordController::class, 'index'])->name('cash_denomination_record');
            Route::get('cash_denomination_record/create', [CashDenominationRecordController::class, 'create'])->name('cash_denomination_record.create');
            Route::get('cash_denomination_record/edit/{id}', [CashDenominationRecordController::class, 'edit'])->name('cash_denomination_record.edit');
            Route::get('cash_denomination_record/delete/{id}', [CashDenominationRecordController::class, 'delete'])->name('cash_denomination_record.delete');
            Route::post('cash_denomination_record/store', [CashDenominationRecordController::class, 'store'])->name('cash_denomination_record.store');
            Route::post('cash_denomination_record/update', [CashDenominationRecordController::class, 'update'])->name('cash_denomination_record.update');

            //  CHEQUE BOOK STOCK TRANSACTION
            Route::get('cheque_book_stock', [ChequeBookStockController::class, 'index'])->name('cheque_book_stock');
            Route::get('cheque_book_stock/create', [ChequeBookStockController::class, 'create'])->name('cheque_book_stock.create');
            Route::get('cheque_book_stock/edit/{id}', [ChequeBookStockController::class, 'edit'])->name('cheque_book_stock.edit');
            Route::get('cheque_book_stock/delete/{id}', [ChequeBookStockController::class, 'delete'])->name('cheque_book_stock.delete');
            Route::post('cheque_book_stock/store', [ChequeBookStockController::class, 'store'])->name('cheque_book_stock.store');
            Route::post('cheque_book_stock/update', [ChequeBookStockController::class, 'update'])->name('cheque_book_stock.update');

            //  CHEQUE OPENING TRANSACTION
            Route::get('cheque_opening', [ChequeOpeningController::class, 'index'])->name('cheque_opening');
            Route::get('cheque_opening/create', [ChequeOpeningController::class, 'create'])->name('cheque_opening.create');
            Route::get('cheque_opening/edit/{id}', [ChequeOpeningController::class, 'edit'])->name('cheque_opening.edit');
            Route::get('cheque_opening/delete/{id}', [ChequeOpeningController::class, 'delete'])->name('cheque_opening.delete');
            Route::post('cheque_opening/store', [ChequeOpeningController::class, 'store'])->name('cheque_opening.store');
            Route::post('cheque_opening/update', [ChequeOpeningController::class, 'update'])->name('cheque_opening.update');

            //  Reconsilation Date Setup TRANSACTION
            Route::get('reconsilation_date_setup', [ReconsilationDateSetupController::class, 'index'])->name('reconsilation_date_setup');
            Route::get('reconsilation_date_setup/create', [ReconsilationDateSetupController::class, 'create'])->name('reconsilation_date_setup.create');
            Route::get('reconsilation_date_setup/edit/{id}', [ReconsilationDateSetupController::class, 'edit'])->name('reconsilation_date_setup.edit');
            Route::get('reconsilation_date_setup/delete/{id}', [ReconsilationDateSetupController::class, 'delete'])->name('reconsilation_date_setup.delete');
            Route::post('reconsilation_date_setup/store', [ReconsilationDateSetupController::class, 'store'])->name('reconsilation_date_setup.store');
            Route::post('reconsilation_date_setup/update', [ReconsilationDateSetupController::class, 'update'])->name('reconsilation_date_setup.update');

            //  ARRIVAL NOTICE INSTRUCTION
            Route::get('arrival_notice', [ArrivalNoticeController::class, 'index'])->name('arrival_notice');
            Route::get('arrival_notice/create', [ArrivalNoticeController::class, 'create'])->name('arrival_notice.create');
            Route::get('arrival_notice/edit/{id}', [ArrivalNoticeController::class, 'edit'])->name('arrival_notice.edit');
            Route::get('arrival_notice/delete/{id}', [ArrivalNoticeController::class, 'delete'])->name('arrival_notice.delete');
            Route::post('arrival_notice/store', [ArrivalNoticeController::class, 'store'])->name('arrival_notice.store');
            Route::post('arrival_notice/update', [ArrivalNoticeController::class, 'update'])->name('arrival_notice.update');

            //  EPASS WEBOC INSTRUCTION
            Route::get('epass_weboc', [EpassWebocController::class, 'index'])->name('epass_weboc');
            Route::get('epass_weboc/create', [EpassWebocController::class, 'create'])->name('epass_weboc.create');
            Route::get('epass_weboc/edit/{id}', [EpassWebocController::class, 'edit'])->name('epass_weboc.edit');
            Route::get('epass_weboc/delete/{id}', [EpassWebocController::class, 'delete'])->name('epass_weboc.delete');
            Route::post('epass_weboc/store', [EpassWebocController::class, 'store'])->name('epass_weboc.store');
            Route::post('epass_weboc/update', [EpassWebocController::class, 'update'])->name('epass_weboc.update');

            //  PRE ALERT INPUT INSTRUCTION
            Route::get('pre_alert_input', [PreAlertController::class, 'index'])->name('pre_alert_input');
            Route::get('pre_alert_input/create', [PreAlertController::class, 'create'])->name('pre_alert_input.create');
            Route::get('pre_alert_input/edit/{id}', [PreAlertController::class, 'edit'])->name('pre_alert_input.edit');
            Route::get('pre_alert_input/delete/{id}', [PreAlertController::class, 'delete'])->name('pre_alert_input.delete');
            Route::post('pre_alert_input/store', [PreAlertController::class, 'store'])->name('pre_alert_input.store');
            Route::post('pre_alert_input/update', [PreAlertController::class, 'update'])->name('pre_alert_input.update');

            //  DELIVERY ORDER INSTRUCTION
            Route::get('delivery_order', [DeliveryOrderController::class, 'index'])->name('delivery_order');
            Route::get('delivery_order/create', [DeliveryOrderController::class, 'create'])->name('delivery_order.create');
            Route::get('delivery_order/edit/{id}', [DeliveryOrderController::class, 'edit'])->name('delivery_order.edit');
            Route::get('delivery_order/delete/{id}', [DeliveryOrderController::class, 'delete'])->name('delivery_order.delete');
            Route::post('delivery_order/store', [DeliveryOrderController::class, 'store'])->name('delivery_order.store');
            Route::post('delivery_order/update', [DeliveryOrderController::class, 'update'])->name('delivery_order.update');

            //  ADVANCE DETENSION INSTRUCTION
            Route::get('advance_detension', [AdvanceDetensionController::class, 'index'])->name('advance_detension');
            Route::get('advance_detension/create', [AdvanceDetensionController::class, 'create'])->name('advance_detension.create');
            Route::get('advance_detension/edit/{id}', [AdvanceDetensionController::class, 'edit'])->name('advance_detension.edit');
            Route::get('advance_detension/delete/{id}', [AdvanceDetensionController::class, 'delete'])->name('advance_detension.delete');
            Route::post('advance_detension/store', [AdvanceDetensionController::class, 'store'])->name('advance_detension.store');
            Route::post('advance_detension/update', [AdvanceDetensionController::class, 'update'])->name('advance_detension.update');

            //  AUTO  DETENSION INVOICE
            Route::get('auto_detension', [AutoDetensionController::class, 'index'])->name('auto_detension');
            Route::get('auto_detension/create', [AutoDetensionController::class, 'create'])->name('auto_detension.create');
            Route::get('auto_detension/edit/{id}', [AutoDetensionController::class, 'edit'])->name('auto_detension.edit');
            Route::get('auto_detension/delete/{id}', [AutoDetensionController::class, 'delete'])->name('auto_detension.delete');
            Route::post('auto_detension/store', [AutoDetensionController::class, 'store'])->name('auto_detension.store');
            Route::post('auto_detension/update', [AutoDetensionController::class, 'update'])->name('auto_detension.update');

            //  DETENSION SUMMARY
            Route::get('detension_summary', [DetensionSummaryController::class, 'index'])->name('detension_summary');
            Route::get('detension_summary/create', [DetensionSummaryController::class, 'create'])->name('detension_summary.create');
            Route::get('detension_summary/edit/{id}', [DetensionSummaryController::class, 'edit'])->name('detension_summary.edit');
            Route::get('detension_summary/delete/{id}', [DetensionSummaryController::class, 'delete'])->name('detension_summary.delete');
            Route::post('detension_summary/store', [DetensionSummaryController::class, 'store'])->name('detension_summary.store');
            Route::post('detension_summary/update', [DetensionSummaryController::class, 'update'])->name('detension_summary.update');

            //  DETENSION SUMMARY
            Route::get('equipment_invoice_process', [EquipmentInvoiceProcessController::class, 'index'])->name('equipment_invoice_process');
            Route::get('equipment_invoice_process/create', [EquipmentInvoiceProcessController::class, 'create'])->name('equipment_invoice_process.create');
            Route::get('equipment_invoice_process/edit/{id}', [EquipmentInvoiceProcessController::class, 'edit'])->name('equipment_invoice_process.edit');
            Route::get('equipment_invoice_process/delete/{id}', [EquipmentInvoiceProcessController::class, 'delete'])->name('equipment_invoice_process.delete');
            Route::post('equipment_invoice_process/store', [EquipmentInvoiceProcessController::class, 'store'])->name('equipment_invoice_process.store');
            Route::post('equipment_invoice_process/update', [EquipmentInvoiceProcessController::class, 'update'])->name('equipment_invoice_process.update');

            //  REFUND REQUISITION
            Route::get('refund_requisition', [RefundRequisitionController::class, 'index'])->name('refund_requisition');
            Route::get('refund_requisition/create', [RefundRequisitionController::class, 'create'])->name('refund_requisition.create');
            Route::get('refund_requisition/edit/{id}', [RefundRequisitionController::class, 'edit'])->name('refund_requisition.edit');
            Route::get('refund_requisition/delete/{id}', [RefundRequisitionController::class, 'delete'])->name('refund_requisition.delete');
            Route::post('refund_requisition/store', [RefundRequisitionController::class, 'store'])->name('refund_requisition.store');
            Route::post('refund_requisition/update', [RefundRequisitionController::class, 'update'])->name('refund_requisition.update');

            //  REFUND REQUISITION
            Route::get('refund_requisition_report', [RefundRequisitionReportController::class, 'index'])->name('refund_requisition_report');
            Route::get('refund_requisition_report/create', [RefundRequisitionReportController::class, 'create'])->name('refund_requisition_report.create');
            Route::get('refund_requisition_report/edit/{id}', [RefundRequisitionReportController::class, 'edit'])->name('refund_requisition_report.edit');
            Route::get('refund_requisition_report/delete/{id}', [RefundRequisitionReportController::class, 'delete'])->name('refund_requisition_report.delete');
            Route::post('refund_requisition_report/store', [RefundRequisitionReportController::class, 'store'])->name('refund_requisition_report.store');
            Route::post('refund_requisition_report/update', [RefundRequisitionReportController::class, 'update'])->name('refund_requisition_report.update');

            // SECURITY DEPOSITE ACTIVITY REPORT
            Route::get('security_deposite_activity_report', [SecurityDepositeActivityReportController::class, 'index'])->name('security_deposite_activity_report');
            Route::get('security_deposite_activity_report/create', [SecurityDepositeActivityReportController::class, 'create'])->name('security_deposite_activity_report.create');
            Route::get('security_deposite_activity_report/edit/{id}', [SecurityDepositeActivityReportController::class, 'edit'])->name('security_deposite_activity_report.edit');
            Route::get('security_deposite_activity_report/delete/{id}', [SecurityDepositeActivityReportController::class, 'delete'])->name('security_deposite_activity_report.delete');
            Route::post('security_deposite_activity_report/store', [SecurityDepositeActivityReportController::class, 'store'])->name('security_deposite_activity_report.store');
            Route::post('security_deposite_activity_report/update', [SecurityDepositeActivityReportController::class, 'update'])->name('security_deposite_activity_report.update');

            // SECURITY DEPOSITE STATUS REPORT
            Route::get('security_deposite_status_report', [SecurityDepositeStatusReportController::class, 'index'])->name('security_deposite_status_report');
            Route::get('security_deposite_status_report/create', [SecurityDepositeStatusReportController::class, 'create'])->name('security_deposite_status_report.create');
            Route::get('security_deposite_status_report/edit/{id}', [SecurityDepositeStatusReportController::class, 'edit'])->name('security_deposite_status_report.edit');
            Route::get('security_deposite_status_report/delete/{id}', [SecurityDepositeStatusReportController::class, 'delete'])->name('security_deposite_status_report.delete');
            Route::post('security_deposite_status_report/store', [SecurityDepositeStatusReportController::class, 'store'])->name('security_deposite_status_report.store');
            Route::post('security_deposite_status_report/update', [SecurityDepositeStatusReportController::class, 'update'])->name('security_deposite_status_report.update');

            // SECURITY REFUND UTILITY REPORT
            Route::get('security_refund_utility', [SecurityRefundUtilityController::class, 'index'])->name('security_refund_utility');
            Route::get('security_refund_utility/create', [SecurityRefundUtilityController::class, 'create'])->name('security_refund_utility.create');
            Route::get('security_refund_utility/edit/{id}', [SecurityRefundUtilityController::class, 'edit'])->name('security_refund_utility.edit');
            Route::get('security_refund_utility/delete/{id}', [SecurityRefundUtilityController::class, 'delete'])->name('security_refund_utility.delete');
            Route::post('security_refund_utility/store', [SecurityRefundUtilityController::class, 'store'])->name('security_refund_utility.store');
            Route::post('security_refund_utility/update', [SecurityRefundUtilityController::class, 'update'])->name('security_refund_utility.update');

            // SECURITY REFUND UTILITY REPORT
            Route::get('si_bl_amendment', [SiBlAmendmentController::class, 'index'])->name('si_bl_amendment');
            Route::get('si_bl_amendment/create', [SiBlAmendmentController::class, 'create'])->name('si_bl_amendment.create');
            Route::get('si_bl_amendment/edit/{id}', [SiBlAmendmentController::class, 'edit'])->name('si_bl_amendment.edit');
            Route::get('si_bl_amendment/delete/{id}', [SiBlAmendmentController::class, 'delete'])->name('si_bl_amendment.delete');
            Route::post('si_bl_amendment/store', [SiBlAmendmentController::class, 'store'])->name('si_bl_amendment.store');
            Route::post('si_bl_amendment/update', [SiBlAmendmentController::class, 'update'])->name('si_bl_amendment.update');

            // SI EQUIPMENT INVOICE OTHER CHARGES
            Route::get('si_equipment_invoice_other_charges', [SiEquipmentInvoiceOtherController::class, 'index'])->name('si_equipment_invoice_other_charges');
            Route::get('si_equipment_invoice_other_charges/create', [SiEquipmentInvoiceOtherController::class, 'create'])->name('si_equipment_invoice_other_charges.create');
            Route::get('si_equipment_invoice_other_charges/edit/{id}', [SiEquipmentInvoiceOtherController::class, 'edit'])->name('si_equipment_invoice_other_charges.edit');
            Route::get('si_equipment_invoice_other_charges/delete/{id}', [SiEquipmentInvoiceOtherController::class, 'delete'])->name('si_equipment_invoice_other_charges.delete');
            Route::post('si_equipment_invoice_other_charges/store', [SiEquipmentInvoiceOtherController::class, 'store'])->name('si_equipment_invoice_other_charges.store');
            Route::post('si_equipment_invoice_other_charges/update', [SiEquipmentInvoiceOtherController::class, 'update'])->name('si_equipment_invoice_other_charges.update');

            // TERMINAL STOCK REQUIRMENT
            Route::get('terminal_stock_requirement', [TerminalStockRequiremnetController::class, 'index'])->name('terminal_stock_requirement');
            Route::get('terminal_stock_requirement/create', [TerminalStockRequiremnetController::class, 'create'])->name('terminal_stock_requirement.create');
            Route::get('terminal_stock_requirement/edit/{id}', [TerminalStockRequiremnetController::class, 'edit'])->name('terminal_stock_requirement.edit');
            Route::get('terminal_stock_requirement/delete/{id}', [TerminalStockRequiremnetController::class, 'delete'])->name('terminal_stock_requirement.delete');
            Route::post('terminal_stock_requirement/store', [TerminalStockRequiremnetController::class, 'store'])->name('terminal_stock_requirement.store');
            Route::post('terminal_stock_requirement/update', [TerminalStockRequiremnetController::class, 'update'])->name('terminal_stock_requirement.update');

            // BULK DELETE CONTAINER ACTIVITY
            Route::get('bulk_delete_container_activity', [BulkDeleteContainerActivityController::class, 'index'])->name('bulk_delete_container_activity');
            Route::get('bulk_delete_container_activity/create', [BulkDeleteContainerActivityController::class, 'create'])->name('bulk_delete_container_activity.create');
            Route::get('bulk_delete_container_activity/edit/{id}', [BulkDeleteContainerActivityController::class, 'edit'])->name('bulk_delete_container_activity.edit');
            Route::get('bulk_delete_container_activity/delete/{id}', [BulkDeleteContainerActivityController::class, 'delete'])->name('bulk_delete_container_activity.delete');
            Route::post('bulk_delete_container_activity/store', [BulkDeleteContainerActivityController::class, 'store'])->name('bulk_delete_container_activity.store');
            Route::post('bulk_delete_container_activity/update', [BulkDeleteContainerActivityController::class, 'update'])->name('bulk_delete_container_activity.update');

            // BULK DELETE CONTAINER ACTIVITY
            Route::get('container_activity', [ContainerActivityController::class, 'index'])->name('container_activity');
            Route::get('container_activity/create', [ContainerActivityController::class, 'create'])->name('container_activity.create');
            Route::get('container_activity/edit/{id}', [ContainerActivityController::class, 'edit'])->name('container_activity.edit');
            Route::get('container_activity/delete/{id}', [ContainerActivityController::class, 'delete'])->name('container_activity.delete');
            Route::post('container_activity/store', [ContainerActivityController::class, 'store'])->name('container_activity.store');
            Route::post('container_activity/update', [ContainerActivityController::class, 'update'])->name('container_activity.update');

            // GUARANTEE FILLING ANELLATION
            Route::get('guarantee_filling_anellation', [GuaranteeFillingAnellationController::class, 'index'])->name('guarantee_filling_anellation');
            Route::get('guarantee_filling_anellation/create', [GuaranteeFillingAnellationController::class, 'create'])->name('guarantee_filling_anellation.create');
            Route::get('guarantee_filling_anellation/edit/{id}', [GuaranteeFillingAnellationController::class, 'edit'])->name('guarantee_filling_anellation.edit');
            Route::get('guarantee_filling_anellation/delete/{id}', [GuaranteeFillingAnellationController::class, 'delete'])->name('guarantee_filling_anellation.delete');
            Route::post('guarantee_filling_anellation/store', [GuaranteeFillingAnellationController::class, 'store'])->name('guarantee_filling_anellation.store');
            Route::post('guarantee_filling_anellation/update', [GuaranteeFillingAnellationController::class, 'update'])->name('guarantee_filling_anellation.update');

            // GUARANTEE LETTER LIST
            Route::get('guarantee_letter_list', [GuaranteeLetterListController::class, 'index'])->name('guarantee_letter_list');
            Route::get('guarantee_letter_list/create', [GuaranteeLetterListController::class, 'create'])->name('guarantee_letter_list.create');
            Route::get('guarantee_letter_list/edit/{id}', [GuaranteeLetterListController::class, 'edit'])->name('guarantee_letter_list.edit');
            Route::get('guarantee_letter_list/delete/{id}', [GuaranteeLetterListController::class, 'delete'])->name('guarantee_letter_list.delete');
            Route::post('guarantee_letter_list/store', [GuaranteeLetterListController::class, 'store'])->name('guarantee_letter_list.store');
            Route::post('guarantee_letter_list/update', [GuaranteeLetterListController::class, 'update'])->name('guarantee_letter_list.update');

            // GUARANTEE LETTER PROCESS
            Route::get('guarantee_letter_process', [GuaranteeLetterProcessController::class, 'index'])->name('guarantee_letter_process');
            Route::get('guarantee_letter_process/create', [GuaranteeLetterProcessController::class, 'create'])->name('guarantee_letter_process.create');
            Route::get('guarantee_letter_process/edit/{id}', [GuaranteeLetterProcessController::class, 'edit'])->name('guarantee_letter_process.edit');
            Route::get('guarantee_letter_process/delete/{id}', [GuaranteeLetterProcessController::class, 'delete'])->name('guarantee_letter_process.delete');
            Route::post('guarantee_letter_process/store', [GuaranteeLetterProcessController::class, 'store'])->name('guarantee_letter_process.store');
            Route::post('guarantee_letter_process/update', [GuaranteeLetterProcessController::class, 'update'])->name('guarantee_letter_process.update');

            // GUARANTEE LETTER TEMPLATE
            Route::get('guarantee_letter_template', [GuaranteeLetterTemplateController::class, 'index'])->name('guarantee_letter_template');
            Route::get('guarantee_letter_template/create', [GuaranteeLetterTemplateController::class, 'create'])->name('guarantee_letter_template.create');
            Route::get('guarantee_letter_template/edit/{id}', [GuaranteeLetterTemplateController::class, 'edit'])->name('guarantee_letter_template.edit');
            Route::get('guarantee_letter_template/delete/{id}', [GuaranteeLetterTemplateController::class, 'delete'])->name('guarantee_letter_template.delete');
            Route::post('guarantee_letter_template/store', [GuaranteeLetterTemplateController::class, 'store'])->name('guarantee_letter_template.store');
            Route::post('guarantee_letter_template/update', [GuaranteeLetterTemplateController::class, 'update'])->name('guarantee_letter_template.update');

            // GUARANTEE LETTER
            Route::get('guarantee_letter', [GuaranteeLetterController::class, 'index'])->name('guarantee_letter');
            Route::get('guarantee_letter/create', [GuaranteeLetterController::class, 'create'])->name('guarantee_letter.create');
            Route::get('guarantee_letter/edit/{id}', [GuaranteeLetterController::class, 'edit'])->name('guarantee_letter.edit');
            Route::get('guarantee_letter/delete/{id}', [GuaranteeLetterController::class, 'delete'])->name('guarantee_letter.delete');
            Route::post('guarantee_letter/store', [GuaranteeLetterController::class, 'store'])->name('guarantee_letter.store');
            Route::post('guarantee_letter/update', [GuaranteeLetterController::class, 'update'])->name('guarantee_letter.update');

            // SECURITY DEPOSITE
            Route::get('security_deposite', [SecurityDepositeController::class, 'index'])->name('security_deposite');
            Route::get('security_deposite/create', [SecurityDepositeController::class, 'create'])->name('security_deposite.create');
            Route::get('security_deposite/edit/{id}', [SecurityDepositeController::class, 'edit'])->name('security_deposite.edit');
            Route::get('security_deposite/delete/{id}', [SecurityDepositeController::class, 'delete'])->name('security_deposite.delete');
            Route::post('security_deposite/store', [SecurityDepositeController::class, 'store'])->name('security_deposite.store');
            Route::post('security_deposite/update', [SecurityDepositeController::class, 'update'])->name('security_deposite.update');

            // VESSEL ARRIVAL DEPARTURE REPORT
            Route::get('vessel_arrival_departure_report', [VesselArrivalDepartureReportController::class, 'index'])->name('vessel_arrival_departure_report');
            Route::get('vessel_arrival_departure_report/create', [VesselArrivalDepartureReportController::class, 'create'])->name('vessel_arrival_departure_report.create');
            Route::get('vessel_arrival_departure_report/edit/{id}', [VesselArrivalDepartureReportController::class, 'edit'])->name('vessel_arrival_departure_report.edit');
            Route::get('vessel_arrival_departure_report/delete/{id}', [VesselArrivalDepartureReportController::class, 'delete'])->name('vessel_arrival_departure_report.delete');
            Route::post('vessel_arrival_departure_report/store', [VesselArrivalDepartureReportController::class, 'store'])->name('vessel_arrival_departure_report.store');
            Route::post('vessel_arrival_departure_report/update', [VesselArrivalDepartureReportController::class, 'update'])->name('vessel_arrival_departure_report.update');

            // CRT EDI
            Route::get('crt_edi', [CrtEdiController::class, 'index'])->name('crt_edi');
            Route::get('crt_edi/create', [CrtEdiController::class, 'create'])->name('crt_edi.create');
            Route::get('crt_edi/edit/{id}', [CrtEdiController::class, 'edit'])->name('crt_edi.edit');
            Route::get('crt_edi/delete/{id}', [CrtEdiController::class, 'delete'])->name('crt_edi.delete');
            Route::post('crt_edi/store', [CrtEdiController::class, 'store'])->name('crt_edi.store');
            Route::post('crt_edi/update', [CrtEdiController::class, 'update'])->name('crt_edi.update');

            // PRINCIPAL MANUAL SOA
            Route::get('principal_manual_soa', [PrincipalManualSoaController::class, 'index'])->name('principal_manual_soa');
            Route::get('principal_manual_soa/create', [PrincipalManualSoaController::class, 'create'])->name('principal_manual_soa.create');
            Route::get('principal_manual_soa/edit/{id}', [PrincipalManualSoaController::class, 'edit'])->name('principal_manual_soa.edit');
            Route::get('principal_manual_soa/delete/{id}', [PrincipalManualSoaController::class, 'delete'])->name('principal_manual_soa.delete');
            Route::post('principal_manual_soa/store', [PrincipalManualSoaController::class, 'store'])->name('principal_manual_soa.store');
            Route::post('principal_manual_soa/update', [PrincipalManualSoaController::class, 'update'])->name('principal_manual_soa.update');

            // PRINCIPAL MANUAL SOA
            Route::get('principal_soa', [PrincipalSoaController::class, 'index'])->name('principal_soa');
            Route::get('principal_soa/create', [PrincipalSoaController::class, 'create'])->name('principal_soa.create');
            Route::get('principal_soa/edit/{id}', [PrincipalSoaController::class, 'edit'])->name('principal_soa.edit');
            Route::get('principal_soa/delete/{id}', [PrincipalSoaController::class, 'delete'])->name('principal_soa.delete');
            Route::post('principal_soa/store', [PrincipalSoaController::class, 'store'])->name('principal_soa.store');
            Route::post('principal_soa/update', [PrincipalSoaController::class, 'update'])->name('principal_soa.update');

            // PRINCIPAL RECEIPT PAYMENT
            Route::get('principal_receipt_payment', [PrincipalReceiptPaymentController::class, 'index'])->name('principal_receipt_payment');
            Route::get('principal_receipt_payment/create', [PrincipalReceiptPaymentController::class, 'create'])->name('principal_receipt_payment.create');
            Route::get('principal_receipt_payment/edit/{id}', [PrincipalReceiptPaymentController::class, 'edit'])->name('principal_receipt_payment.edit');
            Route::get('principal_receipt_payment/delete/{id}', [PrincipalReceiptPaymentController::class, 'delete'])->name('principal_receipt_payment.delete');
            Route::post('principal_receipt_payment/store', [PrincipalReceiptPaymentController::class, 'store'])->name('principal_receipt_payment.store');
            Route::post('principal_receipt_payment/update', [PrincipalReceiptPaymentController::class, 'update'])->name('principal_receipt_payment.update');


            // USER SETUP ROUTES
            Route::get('user/create', [ManageUserController::class, 'create'])->name('user.create');
            Route::get('user/edit/{id}', [ManageUserController::class, 'edit'])->name('user.edit');
            Route::get('user/delete/{id}', [ManageUserController::class, 'delete'])->name('user.delete');
            Route::post('user/store', [ManageUserController::class, 'store'])->name('user.store');
            Route::post('user/update', [ManageUserController::class, 'update'])->name('user.update');
            Route::post('user/get', [ManageUserController::class, 'get_data'])->name('user.get');


            // USER RIGHT ROUTES
            Route::get('user-right/create', [ManageUserController::class, 'user_right_create'])->name('user_right.create');
            Route::get('user-right/delete/{id}', [ManageUserController::class, 'user_right_delete'])->name('user_right.delete');
            Route::post('user-right/store', [ManageUserController::class, 'user_right_store'])->name('user_right.store');
            Route::post('user-right/update', [ManageUserController::class, 'user_right_update'])->name('user_right.update');
            Route::post('user-right/get', [ManageUserController::class, 'user_right_get_data'])->name('user_right.get');


            // USER SECURITY ROLES ROUTES
            Route::get('security-role/create', [RoleController::class, 'create'])->name('security_role.create');
            Route::get('security-role/delete/{id}', [RoleController::class, 'delete'])->name('security_role.delete');
            Route::post('security-role/store', [RoleController::class, 'store'])->name('security_role.store');
            Route::post('security-role/update', [RoleController::class, 'update'])->name('security_role.update');
            Route::post('security-role/get', [RoleController::class, 'get_data'])->name('security_role.get');


            // USER NAV ROUTES
            Route::get('nav/create', [NavController::class, 'create'])->name('nav.create');
            Route::get('nav/delete/{id}', [NavController::class, 'delete'])->name('nav.delete');
            Route::post('nav/store', [NavController::class, 'store'])->name('nav.store');
            Route::post('nav/update', [NavController::class, 'update'])->name('nav.update');
            Route::post('nav/get', [NavController::class, 'get_data'])->name('nav.get');
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
        [RegisterController::class, 'showRegistrationForm']
    )->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('register');

    Route::get(
        'password/reset',
        [ForgotPasswordController::class, 'showLinkRequestForm']
    )->name('password.request');
    Route::post(
        'password/email',
        [ForgotPasswordController::class, 'sendResetLinkEmail']
    )->name('password.email');
    Route::get(
        'password/code-verify',
        [ForgotPasswordController::class, 'codeVerify']
    )->name('password.code_verify');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name(
        'password.update'
    );
    Route::get(
        'password/reset/{token}',
        [ResetPasswordController::class, 'showResetForm']
    )->name('password.reset');
    Route::post(
        'password/verify-code',
        [ForgotPasswordController::class, 'verifyCode']
    )->name('password.verify-code');

    //Auth Work Ends
});

Route::name('user.')->prefix('user')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('authorization', [AuthorizationController::class, 'authorizeForm'])->name('authorization');
        Route::get('resend-verify', [AuthorizationController::class, 'sendVerifyCode'])->name('send_verify_code');
        Route::post('verify-email', [AuthorizationController::class, 'emailVerification'])->name('verify_email');
        Route::post('verify-sms', [AuthorizationController::class, 'smsVerification'])->name('verify_sms');
        Route::post('verify-g2fa', [AuthorizationController::class, 'g2faVerification'])->name('go2fa.verify');

        Route::middleware(['checkStatus'])->group(function () {
            Route::get('dashboard', [UserController::class, 'home'])->name('home');

            Route::get('profile-setting', [UserController::class, 'profile'])->name('profile-setting');
            Route::post('profile-setting', [UserController::class, 'submitProfile']);
            Route::get('change-password', [UserController::class, 'changePassword'])->name('change-password');
            Route::post('change-password', [UserController::class, 'submitPassword']);

            //2FA
            Route::get('twofactor', [UserController::class, 'show2faForm'])->name('twofactor');
            Route::post('twofactor/enable', [UserController::class, 'create2fa'])->name('twofactor.enable');
            Route::post('twofactor/disable', [UserController::class, 'disable2fa'])->name('twofactor.disable');
            Route::get('login/history', [UserController::class, 'userLoginHistory'])->name('login.history');
        });
    });
});
