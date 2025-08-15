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
        Schema::create('gl_bill_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gl_bill_id');
            $table->unsignedBigInteger('account_id');
            $table->string('cost_center', 100)->nullable();
            $table->string('dr_cr', 10)->nullable();
            $table->decimal('amount_vc', 18, 4)->default(0);
            $table->decimal('amount_lc', 18, 4)->default(0);
            $table->string('narration', 250)->nullable();
            $table->string('tax_type', 50)->nullable();
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
        Schema::dropIfExists('gl_bill_invoice_details');
    }
};
