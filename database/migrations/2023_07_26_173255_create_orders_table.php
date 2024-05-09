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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('format');
            $table->string('height');
            $table->string('width');
            $table->text('fabric');
            $table->text('placement');
            $table->text('no_of_colors');
            $table->text('additional_instructions');
            $table->text('files');
            $table->tinyInteger('urgent')->default(0);
            $table->BigInteger('user_id');
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
        Schema::dropIfExists('orders');
    }
};
