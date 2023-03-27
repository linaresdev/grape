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
           $table->string("firstname", 30)->nullable();
           $table->string("lastname", 30)->nullable();
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

        Schema::create('usersmeta', function (Blueprint $table) {
            $table->bigIncrements('id');
 
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
 
            $table->string("type", 30)->default("info");
 
            $table->string('key', 255);
            $table->text('value')->nullable();
 
            $table->boolean('activated')->default(1);
         });

         Schema::create('usersreset', function (Blueprint $table) {
            
            $table->increments('id');

            $table->string('email', 130)->index();
            $table->string('token', 100);

            $table->timestamp('expired');

            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        Schema::create('userssession', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->string("payload", 75);

            $table->string("guard", 30)->nullable();

            $table->string("ip_address", 45)->nullable();
            $table->text("agent")->nullable();

            $table->char("activated", 1)->default(1);

            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        Schema::create('usersgroups', function (Blueprint $table) {

            $table->increments('id');

            $table->integer("parent")->default(0);

            $table->string("type", 30)->default("rol");

            $table->string("slug", 100);

            $table->text("group")->nullable();

            $table->boolean("access")->default(0);
            $table->string("icon", 30)->default("link");

            $table->boolean("activated")->default(1);

            $table->engine = 'InnoDB';
        }); 

         Schema::create('usersgroups_pivots', function (Blueprint $table) {
            $table->increments('id');
 
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
 
            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('usersgroups')->onDelete('CASCADE')->onUpdate('CASCADE');
 
            $table->boolean("view")->default(1);
            $table->boolean("insert")->default(0);
            $table->boolean("update")->default(0);
            $table->boolean("delete")->default(0);
         });

         Schema::create( 'usersgroups_metas', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('usersgroups')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->string("type", 30)->default("info");

            $table->string("slug")->nullable();
            $table->text("value")->nullable();

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('usersgroups_metas');
        Schema::dropIfExists('usersgroups_pivots');
        Schema::dropIfExists('usersgroups');
        Schema::dropIfExists('userssession');
        Schema::dropIfExists('usersreset');
        Schema::dropIfExists('usersmeta');
        Schema::dropIfExists('users');
    }
};
