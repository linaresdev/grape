<?php
namespace Grape\Core\Database;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use \Artisan;
use Illuminate\Support\Facades\Schema;

class CoreSchema {

    protected $tables = [
      "apps",
      "appinfo",
      "appmeta",
      "routes",
    ];

    public function routes() {
      if( !Schema::hasTable("routes") ) {
         Schema::create('routes', function ($table) {
            $table->increments('id');

            $table->string("domain", 30)->nullable();
            $table->string("method", 30);
            $table->string("prefix", 30)->default('/');
            $table->string("uri", 30)->default('/');
            $table->string("name", 30)->nullable();
            $table->string("action", 30);

            $table->string("middleware", 30)->nullable();

            $table->boolean("activated", 1)->default(1);

            $table->timestamps();

            $table->engine = 'InnoDB';
         });
      }
   }

    public function apps() {
      if( !Schema::hasTable("apps") ) {
         Schema::create('apps', function ($table) {
            $table->increments('id');

            $table->string("type", 30);
            $table->string("slug", 30)->unique();
            $table->text("argument")->nullable();
            $table->text("token")->nullable();

            $table->char("activated", 1)->default(0);

            $table->timestamps();

            $table->engine = 'InnoDB';
         });
      }
    }

    public function appinfo() {
      if( !Schema::hasTable("appinfo") ) {
         Schema::create('appinfo', function ($table) {
            $table->integer('app_id')->unsigned();
            $table->foreign('app_id')->references('id')->on('apps')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->string("name", 30)->nullable();
            $table->string("author", 150)->nullable();
            $table->string("email", 80)->nullable();
            $table->text("avatar")->default("cdn/assets/images/empty.png");
            $table->string("license", 15)->nullable();
            $table->text("support")->nullable();
            $table->string("version", 15)->nullable();
            $table->string("description", 100)->nullable();
            $table->text("comment")->nullable();

            $table->timestamps();

            $table->engine = 'InnoDB';
         });
      }
    }

    public function appmeta() {
      if( !Schema::hasTable("appmeta") ) {
         Schema::create( 'appmeta', function( $table ) {
            
          $table->bigIncrements('id');

            $table->string("type", 30);

            $table->integer('app_id')->unsigned();
            $table->foreign('app_id')->references('id')->on('apps')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->string("key", 200);
            $table->text("value");

            $table->boolean("activated")->default(1);

            $table->engine = 'InnoDB';
         });
      }
    }

    public function up() {
      $notes = null;
      $ident = " -- ";

      foreach ( $this->tables as $table ) {

        if( !Schema::hasTable($table) ) {
          $this->{$table}();
          $notes[] = $ident.__("core.schema.create.success", ["table" => $table]);
        }
        else {
          $notes[] = $ident.__("core.shema.create.exists", ["table" => $table]);
        }
      }

      return $notes;
    }

    public function down() {
      $notes = null;
      $ident = " -- ";

      if(Schema::hasTable("migrations")) {
  			if(\DB::table("migrations")->count() == 0) {
  				Schema::dropIfExists("migrations");
          $notes[] = $ident.__("core.migrate.reset");
  			}
  		}

      foreach ( array_reverse($this->tables) as $table ) {
        if( Schema::hasTable($table) ) {
          Schema::dropIfExists($table);
          $notes[] = $ident.__("core.schema.drop.success", ["table" => $table]);
        }
        else {
          $notes[] = $ident.__("core.schema.empty", ["table" => $table]);
        }
      }

      return $notes;
    }
}
