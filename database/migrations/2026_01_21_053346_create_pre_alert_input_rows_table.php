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
        Schema::create('pre_alert_input_rows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pre_alert_input_id');
            $table->boolean('soc')->default(false);
            $table->boolean('part_fcl')->default(false);
            $table->unsignedBigInteger('container_id')->default(0);
            $table->unsignedBigInteger('size_type_id')->default(0);
            $table->string('rate_group', 100)->nullable();
            $table->unsignedBigInteger('principal_id')->default(0);
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
        Schema::dropIfExists('pre_alert_input_rows');
    }
};
