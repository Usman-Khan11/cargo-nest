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
        Schema::create('card_details', function (Blueprint $table) {
            $table->id();
            $table->text('card_holder_name');
            $table->text('company_name');
            $table->text('card_type');
            $table->text('card_number');
            $table->text('expiry_month');
            $table->text('expiry_year');
            $table->text('expiry_cvc');
            $table->text('billing_address');
            $table->text('city');
            $table->text('state');
            $table->text('country');
            $table->text('zipcode');
            $table->text('user_id');
            $table->text('added_by');
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
        Schema::dropIfExists('card_details');
    }
};
