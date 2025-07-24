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
        Schema::table('container_movements', function (Blueprint $table) {
            $table->string('empty_return', 15)->nullable()->after('departure_date');
            $table->unsignedBigInteger('vessel_id')->nullable()->after('empty_return');
            $table->unsignedBigInteger('voyage_id')->nullable()->after('vessel_id');
            $table->string('bl_no', 150)->nullable()->after('destination_principal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('container_movements', function (Blueprint $table) {
            $table->dropColumn('empty_return');
            $table->dropColumn('vessel_id');
            $table->dropColumn('voyage_id');
            $table->dropColumn('bl_no');
        });
    }
};
