<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('usersmeta', function (Blueprint $table) {
           $table->bigIncrements('id');

           $table->bigInteger('user_id')->unsigned();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');

           $table->string("type", 30)->default("info");

           $table->string('key', 255);
           $table->text('value')->nullable();

           $table->boolean('activated')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('usersmeta');
    }
};
