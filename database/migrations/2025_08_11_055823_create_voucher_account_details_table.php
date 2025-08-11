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
        Schema::create('voucher_account_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('voucher_id');
            $table->unsignedBigInteger('account_id');
            $table->string('cost_center', 100)->nullable();
            $table->decimal('debit_vc', 18, 4)->default(0);
            $table->decimal('credit_vc', 18, 4)->default(0);
            $table->decimal('debit_lc', 18, 4)->default(0);
            $table->decimal('credit_lc', 18, 4)->default(0);
            $table->string('narration', 250)->nullable();
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
        Schema::dropIfExists('voucher_account_details');
    }
};
