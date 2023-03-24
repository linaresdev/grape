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
      "drivers",
      "configs",
      "locales"
    ];

   public function drivers() {
    if( !Schema::hasTable("drivers") ) {

       Schema::create('drivers', function ($table) {
          $table->increments('id');

          $table->string("type", 30);
          $table->integer('parent')->default(0);
          $table->string("slug", 30);
          $table->text("driver")->nullable();
          $table->text("token")->nullable();
          $table->string("icon", 30)->nullable();

          $table->char("activated", 1)->default(0);

          $table->timestamps();

          $table->engine = 'InnoDB';          
       });

    }
  }

  public function configs() {
      if( !Schema::hasTable("configs") ) {

        Schema::create( 'configs', function( $table ) {            
          $table->bigIncrements('id');

            $table->integer('driver_id')->unsigned();
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->string("key", 200);
            $table->text("value");

            $table->boolean("activated")->default(1);

            $table->engine = 'InnoDB';
        });
        
      }
    }

    public function locales() {
      if( !Schema::hasTable("locales") ) {

        Schema::create( 'locales', function( $table ) {            
          $table->bigIncrements('id');

            $table->integer('driver_id')->unsigned();
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->string("key", 200);
            $table->text("value");

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
