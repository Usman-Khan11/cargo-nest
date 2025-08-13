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
        Schema::create('gl_bills', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_no', 20);
            $table->string('bill_no', 20);
            $table->string('gst_invoice_no', 20)->nullable();
            $table->date('date')->nullable();
            $table->date('vendor_bill_date')->nullable();
            $table->date('due_date')->nullable();
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('company_id');
            $table->string('balance', 30)->nullable();
            $table->string('cost_center', 30)->nullable();
            $table->unsignedBigInteger('currency_id');
            $table->decimal('exchange_rate', 18, 6)->default(0);
            $table->string('print_on', 25)->nullable();
            $table->text('narration')->nullable();
            $table->decimal('invoice_amount', 18, 6)->default(0);
            $table->decimal('tax_amount', 18, 6)->default(0);
            $table->decimal('net_amount', 18, 6)->default(0);
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
        Schema::dropIfExists('gl_bills');
    }
};
