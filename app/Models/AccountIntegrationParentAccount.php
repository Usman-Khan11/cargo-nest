<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountIntegrationParentAccount extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'account_integration_parent_accounts';

    public function vendor_city()
    {
        return $this->belongsTo(Location::class, 'vendor_city_id', 'id');
    }

    public function vendor_account()
    {
        return $this->belongsTo(ChartAccount::class, 'vendor_account_id', 'id');
    }

    public function vendor_all_city_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'vendor_all_city_acc_id', 'id');
    }

    public function consignee_city()
    {
        return $this->belongsTo(Location::class, 'consignee_city_id', 'id');
    }

    public function consignee_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'consignee_acc_id', 'id');
    }

    public function consignee_all_city_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'consignee_all_city_acc_id', 'id');
    }

    public function shipper_city()
    {
        return $this->belongsTo(Location::class, 'shipper_city_id', 'id');
    }

    public function shipper_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'shipper_acc_id', 'id');
    }

    public function shipper_all_city_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'shipper_all_city_acc_id', 'id');
    }

    public function general_principal_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'general_principal_acc_id', 'id');
    }

    public function general_commission_agent_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'general_commission_agent_acc_id', 'id');
    }

    public function general_terminal_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'general_terminal_acc_id', 'id');
    }

    public function general_overseas_agent_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'general_overseas_agent_acc_id', 'id');
    }

    public function export_revenue_ocean_freight_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'export_revenue_ocean_freight_acc_id', 'id');
    }

    public function export_expense_ocean_freight_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'export_expense_ocean_freight_acc_id', 'id');
    }

    public function export_revenue_documentation_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'export_revenue_documentation_acc_id', 'id');
    }

    public function export_expense_documentation_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'export_expense_documentation_acc_id', 'id');
    }

    public function export_revenue_lcl_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'export_revenue_lcl_acc_id', 'id');
    }

    public function export_expense_lcl_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'export_expense_lcl_acc_id', 'id');
    }

    public function export_revenue_fcl_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'export_revenue_fcl_acc_id', 'id');
    }

    public function export_expense_fcl_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'export_expense_fcl_acc_id', 'id');
    }

    public function export_revenue_air_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'export_revenue_air_acc_id', 'id');
    }

    public function export_expense_air_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'export_expense_air_acc_id', 'id');
    }

    public function export_revenue_break_bulk_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'export_revenue_break_bulk_acc_id', 'id');
    }

    public function export_expense_break_bulk_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'export_expense_break_bulk_acc_id', 'id');
    }

    public function import_revenue_ocean_freight_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'import_revenue_ocean_freight_acc_id', 'id');
    }

    public function import_expense_ocean_freight_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'import_expense_ocean_freight_acc_id', 'id');
    }

    public function import_revenue_delivery_order_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'import_revenue_delivery_order_acc_id', 'id');
    }

    public function import_expense_delivery_order_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'import_expense_delivery_order_acc_id', 'id');
    }

    public function import_revenue_lcl_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'import_revenue_lcl_acc_id', 'id');
    }

    public function import_expense_lcl_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'import_expense_lcl_acc_id', 'id');
    }

    public function import_revenue_fcl_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'import_revenue_fcl_acc_id', 'id');
    }

    public function import_expense_fcl_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'import_expense_fcl_acc_id', 'id');
    }

    public function import_revenue_air_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'import_revenue_air_acc_id', 'id');
    }

    public function import_expense_air_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'import_expense_air_acc_id', 'id');
    }

    public function import_revenue_break_bulk_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'import_revenue_break_bulk_acc_id', 'id');
    }

    public function import_expense_break_bulk_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'import_expense_break_bulk_acc_id', 'id');
    }

    public function import_revenue_sec_receivable_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'import_revenue_sec_receivable_acc_id', 'id');
    }

    public function import_expense_sec_payable_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'import_expense_sec_payable_acc_id', 'id');
    }

    public function logistics_revenue_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'logistics_revenue_acc_id', 'id');
    }

    public function logistics_expense_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'logistics_expense_acc_id', 'id');
    }

    public function other_security_inhand_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'other_security_inhand_acc_id', 'id');
    }

    public function other_exchange_rate_gl_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'other_exchange_rate_gl_acc_id', 'id');
    }

    public function other_wip_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'other_wip_acc_id', 'id');
    }

    public function other_advanced_against_running_detention_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'other_advanced_against_running_detention_acc_id', 'id');
    }

    public function other_principal_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'other_principal_acc_id', 'id');
    }

    public function other_margin_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'other_margin_acc_id', 'id');
    }

    public function other_bank_charges_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'other_bank_charges_acc_id', 'id');
    }

    public function other_round_factor_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'other_round_factor_acc_id', 'id');
    }

    public function other_convenience_fees_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'other_convenience_fees_acc_id', 'id');
    }

    public function other_negative_round_factor_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'other_negative_round_factor_acc_id', 'id');
    }
}
