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
        Schema::create('account_integration_charges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('charges_id');
            $table->unsignedBigInteger('account_id');
            $table->string('job_type', 30)->nullable();
            $table->string('account_type', 30)->nullable();
            $table->string('operation', 30)->nullable();
            $table->string('sub_type', 30)->nullable();
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
        Schema::dropIfExists('account_integration_charges');
    }
};
