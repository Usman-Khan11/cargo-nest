<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_integration_parent_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_city_id')->default(0);
            $table->unsignedBigInteger('vendor_account_id')->default(0);
            $table->unsignedBigInteger('vendor_all_city_acc_id')->default(0);

            $table->unsignedBigInteger('consignee_city_id')->default(0);
            $table->unsignedBigInteger('consignee_acc_id')->default(0);
            $table->unsignedBigInteger('consignee_all_city_acc_id')->default(0);

            $table->unsignedBigInteger('shipper_city_id')->default(0);
            $table->unsignedBigInteger('shipper_acc_id')->default(0);
            $table->unsignedBigInteger('shipper_all_city_acc_id')->default(0);

            $table->unsignedBigInteger('general_principal_acc_id')->default(0);
            $table->unsignedBigInteger('general_commission_agent_acc_id')->default(0);
            $table->unsignedBigInteger('general_terminal_acc_id')->default(0);
            $table->unsignedBigInteger('general_overseas_agent_acc_id')->default(0);

            $table->unsignedBigInteger('export_revenue_ocean_freight_acc_id')->default(0);
            $table->unsignedBigInteger('export_expense_ocean_freight_acc_id')->default(0);
            $table->unsignedBigInteger('export_revenue_documentation_acc_id')->default(0);
            $table->unsignedBigInteger('export_expense_documentation_acc_id')->default(0);
            $table->unsignedBigInteger('export_revenue_lcl_acc_id')->default(0);
            $table->unsignedBigInteger('export_expense_lcl_acc_id')->default(0);
            $table->unsignedBigInteger('export_revenue_fcl_acc_id')->default(0);
            $table->unsignedBigInteger('export_expense_fcl_acc_id')->default(0);
            $table->unsignedBigInteger('export_revenue_air_acc_id')->default(0);
            $table->unsignedBigInteger('export_expense_air_acc_id')->default(0);
            $table->unsignedBigInteger('export_revenue_break_bulk_acc_id')->default(0);
            $table->unsignedBigInteger('export_expense_break_bulk_acc_id')->default(0);

            $table->unsignedBigInteger('import_revenue_ocean_freight_acc_id')->default(0);
            $table->unsignedBigInteger('import_expense_ocean_freight_acc_id')->default(0);
            $table->unsignedBigInteger('import_revenue_delivery_order_acc_id')->default(0);
            $table->unsignedBigInteger('import_expense_delivery_order_acc_id')->default(0);
            $table->unsignedBigInteger('import_revenue_lcl_acc_id')->default(0);
            $table->unsignedBigInteger('import_expense_lcl_acc_id')->default(0);
            $table->unsignedBigInteger('import_revenue_fcl_acc_id')->default(0);
            $table->unsignedBigInteger('import_expense_fcl_acc_id')->default(0);
            $table->unsignedBigInteger('import_revenue_air_acc_id')->default(0);
            $table->unsignedBigInteger('import_expense_air_acc_id')->default(0);
            $table->unsignedBigInteger('import_revenue_break_bulk_acc_id')->default(0);
            $table->unsignedBigInteger('import_expense_break_bulk_acc_id')->default(0);
            $table->unsignedBigInteger('import_revenue_sec_receivable_acc_id')->default(0);
            $table->unsignedBigInteger('import_expense_sec_payable_acc_id')->default(0);

            $table->unsignedBigInteger('logistics_revenue_acc_id')->default(0);
            $table->unsignedBigInteger('logistics_expense_acc_id')->default(0);

            $table->unsignedBigInteger('other_security_inhand_acc_id')->default(0);
            $table->unsignedBigInteger('other_exchange_rate_gl_acc_id')->default(0);
            $table->unsignedBigInteger('other_wip_acc_id')->default(0);
            $table->unsignedBigInteger('other_advanced_against_running_detention_acc_id')->default(0);
            $table->unsignedBigInteger('other_principal_acc_id')->default(0);
            $table->unsignedBigInteger('other_margin_acc_id')->default(0);
            $table->unsignedBigInteger('other_bank_charges_acc_id')->default(0);
            $table->unsignedBigInteger('other_round_factor_acc_id')->default(0);
            $table->unsignedBigInteger('other_convenience_fees_acc_id')->default(0);
            $table->unsignedBigInteger('other_negative_round_factor_acc_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_integration_parent_accounts');
    }
};
