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
    public function up() {
        Schema::create('users', function (Blueprint $table) {
           $table->bigIncrements('id');

           $table->string('type')->default("user");
           $table->string('fullname')->nullable();
           $table->string('shortname')->nullable();
           $table->string("rnc", 30)->nullable();
           $table->string('user')->nullable();
           $table->string('cellphone')->nullable();
           $table->string('email')->unique();
           $table->timestamp('email_verified_at')->nullable();
           $table->string('password', 80);
           $table->string("avatar", 200)->default("__avapath/avatar.png");
           
           $table->char("activated", 1)->default(0);

           $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
