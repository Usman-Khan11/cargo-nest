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
        Schema::create('container_movements', function (Blueprint $table) {
            $table->id();
            $table->string('container_id', 150);
            $table->string('container_size', 100)->nullable();
            $table->string('container_principal', 100)->nullable();
            $table->string('destination_principal', 100)->nullable();
            $table->string('location_from', 150)->nullable();
            $table->string('location_to', 150)->nullable();
            $table->string('arrival_date', 10)->nullable();
            $table->string('departure_date', 10)->nullable();
            $table->string('status', 50)->nullable();
            $table->integer('created_by')->default(0);
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
        Schema::dropIfExists('container_movements');
    }
};
