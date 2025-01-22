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
        Schema::create('agent_invoice_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('agent_invoice_id');
            $table->string('t_job_no', 50)->nullable();
            $table->integer('t_charge_id');
            $table->text('t_charge_description')->nullable();
            $table->integer('t_size_type');
            $table->string('t_rate_group', 150)->nullable();
            $table->string('t_dg_non_dg', 50)->nullable();
            $table->string('t_containers', 50)->nullable();
            $table->string('t_hbl_no', 50)->nullable();
            $table->string('t_mbl_no', 50)->nullable();
            $table->string('t_dr_cr', 150)->nullable();
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
        Schema::dropIfExists('agent_invoice_detail');
    }
};
