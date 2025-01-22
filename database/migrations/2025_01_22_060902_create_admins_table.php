<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('email', 255);
            $table->string('phone', 50)->nullable();
            $table->string('username', 150);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('image', 200)->nullable();
            $table->text('access')->nullable();
            $table->string('password', 100);
            $table->text('security_que')->nullable();
            $table->text('security_ans')->nullable();
            $table->tinyInteger('acount_block')->default(0);
            $table->integer('role_id');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });

        DB::table('admins')->insert([
            [
                'name' => 'Master Admin',
                'email' => 'masteradmin@gmail.com',
                'username' => 'admin',
                'password' => Hash::make('newpass@2020'),
                'role_id' => 1,
                'status' => 1,
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
        Schema::dropIfExists('admins');
    }
};
