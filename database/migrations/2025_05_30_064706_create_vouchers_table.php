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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_no', 50);
            $table->string('date', 15)->nullable();
            $table->string('type', 50)->nullable();
            $table->integer('company_id');
            $table->string('settlement', 100)->nullable();
            $table->string('cost_center', 100)->nullable();
            $table->string('bank_sub_type', 100)->nullable();
            $table->integer('currency_id')->default(0);
            $table->string('exchange_rate', 50)->nullable();
            $table->string('cheque_no', 150)->nullable();
            $table->string('cheque_date', 15)->nullable();
            $table->string('pay_to', 150)->nullable();
            $table->tinyInteger('print_on_letter_head')->default(0);
            $table->tinyInteger('extended_voucher')->default(0);
            $table->string('debit', 50)->nullable();
            $table->string('credit', 50)->nullable();
            $table->string('net_amount', 50)->nullable();
            $table->tinyInteger('show_narration')->default(0);
            $table->tinyInteger('receipt_check')->default(0);
            $table->tinyInteger('narration_check')->default(0);
            $table->tinyInteger('apply_check')->default(0);
            $table->text('remark')->nullable();
            $table->text('drawn_at')->nullable();
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
        Schema::dropIfExists('vouchers');
    }
};
