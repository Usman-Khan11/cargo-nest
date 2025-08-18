<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountIntegrationParentAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AccountIntegrateController extends Controller
{
    public function create()
    {
        $data['seo_title']      = "Account Integration";
        $data['seo_desc']       = "Account Integration";
        $data['seo_keywords']   = "Account Integration";
        $data['page_title'] = "Account Integration";
        return view('admin.account_integrate.create', $data);
    }

    public function delete($id)
    {
        AccountIntegrationParentAccount::where("id", $id)->delete();
        $notify[] = ['success', 'Account Integration Deleted Successfully.'];
        return back()->withNotify($notify);
    }

    private function parent_accounts_validation($request)
    {
        $request->validate([
            'vendor_city_id' => 'nullable|integer|exists:locations,id',
            'vendor_account_id' => 'nullable|integer|exists:chart_accounts,id',
            'vendor_all_city_acc_id' => 'nullable|integer|exists:chart_accounts,id',

            'consignee_city_id' => 'nullable|integer|exists:locations,id',
            'consignee_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'consignee_all_city_acc_id' => 'nullable|integer|exists:chart_accounts,id',

            'shipper_city_id' => 'nullable|integer|exists:locations,id',
            'shipper_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'shipper_all_city_acc_id' => 'nullable|integer|exists:chart_accounts,id',

            'general_principal_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'general_commission_agent_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'general_terminal_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'general_overseas_agent_acc_id' => 'nullable|integer|exists:chart_accounts,id',

            'export_revenue_ocean_freight_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'export_expense_ocean_freight_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'export_revenue_documentation_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'export_expense_documentation_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'export_revenue_lcl_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'export_expense_lcl_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'export_revenue_fcl_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'export_expense_fcl_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'export_revenue_air_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'export_expense_air_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'export_revenue_break_bulk_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'export_expense_break_bulk_acc_id' => 'nullable|integer|exists:chart_accounts,id',

            'import_revenue_ocean_freight_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'import_expense_ocean_freight_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'import_revenue_delivery_order_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'import_expense_delivery_order_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'import_revenue_lcl_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'import_expense_lcl_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'import_revenue_fcl_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'import_expense_fcl_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'import_revenue_air_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'import_expense_air_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'import_revenue_break_bulk_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'import_expense_break_bulk_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'import_revenue_sec_receivable_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'import_expense_sec_payable_acc_id' => 'nullable|integer|exists:chart_accounts,id',

            'logistics_revenue_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'logistics_expense_acc_id' => 'nullable|integer|exists:chart_accounts,id',

            'other_security_inhand_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'other_exchange_rate_gl_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'other_wip_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'other_advanced_against_running_detention_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'other_principal_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'other_margin_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'other_bank_charges_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'other_round_factor_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'other_convenience_fees_acc_id' => 'nullable|integer|exists:chart_accounts,id',
            'other_negative_round_factor_acc_id' => 'nullable|integer|exists:chart_accounts,id',
        ]);
    }

    public function store(Request $request)
    {
        $user_info = session()->get('user_info');
        $this->parent_accounts_validation($request);

        try {
            DB::beginTransaction();

            $accountintegrate = AccountIntegrationParentAccount::first() ?? new AccountIntegrationParentAccount();
            $accountintegrate->fill($request->all());
            $accountintegrate->save();

            DB::commit();
            $notify[] = ['success', 'Account Integration created successfully.'];
        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['error', $e->getLine() . ': ' . $e->getMessage()];
        }

        return redirect()->route('admin.account_integrate.create')->withNotify($notify);
    }

    public function update(Request $request)
    {
        $user_info = session()->get('user_info');
        $this->parent_accounts_validation($request);

        try {
            DB::beginTransaction();
            AccountIntegrationParentAccount::first()->delete();

            $accountintegrate = AccountIntegrationParentAccount::first() ?? new AccountIntegrationParentAccount();
            $accountintegrate->fill($request->all());
            $accountintegrate->id = $request->id;
            $accountintegrate->save();

            DB::commit();
            $notify[] = ['success', 'Account Integration updated successfully.'];
        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['error', $e->getLine() . ': ' . $e->getMessage()];
        }

        // $accountintegrate = AccountIntegrationParentAccount::where("id", $request->id)->first();
        return redirect()->route('admin.account_integrate.create')->withNotify($notify);
    }


    public function get_data(Request $request)
    {
        $user_info = session()->get('user_info');
        $id = $request->id;
        $type = $request->type;
        $data = AccountIntegrationParentAccount::with([
            'vendor_city',
            'vendor_account',
            'vendor_all_city_acc',
            'consignee_city',
            'consignee_acc',
            'consignee_all_city_acc',
            'shipper_city',
            'shipper_acc',
            'shipper_all_city_acc',
            'general_principal_acc',
            'general_commission_agent_acc',
            'general_terminal_acc',
            'general_overseas_agent_acc',
            'export_revenue_ocean_freight_acc',
            'export_expense_ocean_freight_acc',
            'export_revenue_documentation_acc',
            'export_expense_documentation_acc',
            'export_revenue_lcl_acc',
            'export_expense_lcl_acc',
            'export_revenue_fcl_acc',
            'export_expense_fcl_acc',
            'export_revenue_air_acc',
            'export_expense_air_acc',
            'export_revenue_break_bulk_acc',
            'export_expense_break_bulk_acc',
            'import_revenue_ocean_freight_acc',
            'import_expense_ocean_freight_acc',
            'import_revenue_delivery_order_acc',
            'import_expense_delivery_order_acc',
            'import_revenue_lcl_acc',
            'import_expense_lcl_acc',
            'import_revenue_fcl_acc',
            'import_expense_fcl_acc',
            'import_revenue_air_acc',
            'import_expense_air_acc',
            'import_revenue_break_bulk_acc',
            'import_expense_break_bulk_acc',
            'import_revenue_sec_receivable_acc',
            'import_expense_sec_payable_acc',
            'logistics_revenue_acc',
            'logistics_expense_acc',
            'other_security_inhand_acc',
            'other_exchange_rate_gl_acc',
            'other_wip_acc',
            'other_advanced_against_running_detention_acc',
            'other_principal_acc',
            'other_margin_acc',
            'other_bank_charges_acc',
            'other_round_factor_acc',
            'other_convenience_fees_acc',
            'other_negative_round_factor_acc',
        ]);

        if ($type == "first") {
            $data = $data->orderBy('id', 'asc');
        } else if ($type == "last") {
            $data = $data->orderBy('id', 'desc');
        } else if ($type == "forward") {
            $data = $data->where('id', '>', $id);
        } else if ($type == "backward") {
            $data = $data->where('id', '<', $id)->orderBy('id', 'desc');
        }

        return $data->first();
    }
}
