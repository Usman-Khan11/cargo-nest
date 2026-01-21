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
        Schema::create('pre_alert_inputs', function (Blueprint $table) {
            $table->id();
            $table->string('tran_no', 100);
            $table->unsignedBigInteger('overseas_agent_id')->default(0);
            $table->unsignedBigInteger('vessel_id')->default(0);
            $table->unsignedBigInteger('voyage_id')->default(0);
            $table->boolean('is_filter')->default(false);
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
        Schema::dropIfExists('pre_alert_inputs');
    }
};
