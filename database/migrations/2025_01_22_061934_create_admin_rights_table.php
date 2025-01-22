<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('admin_rights', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->text('remark')->nullable();
            $table->string('cost_center', 100)->nullable();
            $table->string('default_company', 100)->nullable();
            $table->string('default_departure', 100)->nullable();
            $table->string('default_sale_rep', 100)->nullable();
            $table->string('sign', 200)->nullable();
            $table->string('sign_with_img', 200)->nullable();
            $table->tinyInteger('restrict_company')->default(0);
            $table->timestamps();
        });

        DB::table('admin_rights')->insert([
            [
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_rights');
    }
};
