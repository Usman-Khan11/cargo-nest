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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();            
            $table->string('sitename')->nullable();            
            $table->string('cur_text')->nullable()->comment('currency text');            
            $table->string('cur_sym')->nullable()->comment('currency symbol');            
            $table->string('email_from')->nullable();            
            $table->text('email_template')->nullable();            
            $table->string('base_color')->nullable();            
            $table->string('secondary_color')->nullable();            
            $table->text('mail_config')->nullable();            

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
        Schema::dropIfExists('general_settings');
    }
};
