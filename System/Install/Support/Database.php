<?php
namespace Grape\Install\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Grape\Core\Model\Driver;
use Illuminate\Support\Facades\Schema;

class Database {

   protected $driver;

   protected $store = [
      \Grape\Core\Driver::class,
      \Grape\Driver::class,
      // \Grape\User\Driver::class,
      // \Grape\Menu\Driver::class,
      // \Grape\Admin\Driver::class,
   ];

   protected $orders = [
      "widget","theme","package","pluging","library","core"
   ];

   public function __construct(  Driver $driver ) {
      $this->driver = $driver;
   }

   public function data() {
     
      $data["title"]       = __("words.database");
      $data["dbstor"]      = [
         "engine"   => env("DB_CONNECTION"),
         "host"     => env("DB_HOST"),
         "port"     => env("DB_PORT"),
         "database" => env("DB_DATABASE"),
         "user"     => env("DB_USERNAME")
      ];
      $data["isdb"]        = Schema::hasTable("drivers");

      return $data;
   }

   public function forgeCoreDB() {

      if(($isDB = Schema::hasTable("drivers")) == false ) {

         foreach ( $this->store as $component ) {
            if( class_exists($component) ) {
               if( method_exists(($app = new $component), "install") ) {
                  $app->install($this->driver);
               }
            }
         }

         if(($isDB = Schema::hasTable("drivers")) != false ) {
            $this->alert->success(
               "Las entidades del core creadas correctamente"
            );
         }
      }

      return redirect( __url("install/database") );
   } 

   public function reset() {
      $this->destroy();
      $this->forgeCoreDB();

      $this->alert->success("Entidades reiniciadas correctamentes");

      return back();
   }

   public function account( $request ) {

      $user = new \Grape\User\Store;

      if($user->where("email", $request->email)->count() > 0 ) {
        $user = $user->where("email", $request->email)->first();
      }

      $user->type       = "admin";
      $user->fullname   = "Admin Server";
      $user->shortname  = "Admin";
      $user->email      = $request->email;
      $user->password   = $request->password;

      if( $user->save() ) {         
         $this->alert->success(
            "Cuenta administrativa habilitada"
         );

         return redirect("install/end");
      }   

      $this->alert->success("Error al procesar la cuenta admin");

      return back();
   }

   public function destroy() {

      if( $this->driver->count() > 0 ) {
         $app = $this->driver;

         $uninstallAndDelete = function($type) use ($app) {
            if( ($data = $this->driver->type($type))->count() > 0 ) {
               foreach ( $data->get() as $row ) {
                  $driver = $row->driver;
                  $driver = new $driver;
                  
                  $driver->uninstall( $app );
               }
            }
         };

         foreach ($this->orders as $type) {
            $uninstallAndDelete($type);
         }

         $this->alert->warning("Entidades eliminadas correctamente");
      }
      else {
         (new \Grape\Core\Driver)->uninstall();
         $this->alert->warning("Entidades basicas eliminadas");
      }

      return back();
   }
}
