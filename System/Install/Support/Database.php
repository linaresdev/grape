<?php
namespace Grape\Install\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Grape\Core\Model\Core;

class Database {

   protected $app;

   protected $store = [
      // \Grape\Core\Driver::class,
      // \Grape\User\Driver::class,
      // \Grape\Menu\Driver::class,
      // \Grape\Admin\Driver::class,
   ];

   protected $orders = [
      "widget","theme","package","pluging","library","core"
   ];

   public function __construct(  Core $app ) {
      $this->app = $app;
   }

   public function data() {
      $data["title"]       = __("words.database");
      $data["engine"]      = $this->widgetDB();
      $data["isdb"]        = \Schema::hasTable("apps");

      return $data;
   }

   public function widgetDB() {

      return [
         __("words.engine")   => env("DB_CONNECTION"),
         __("words.host")     => env("DB_HOST"),
         __("words.port")     => env("DB_PORT"),
         __("words.database") => env("DB_DATABASE"),
         __("words.user")     => env("DB_USERNAME")
      ];
   }

   public function forge( $request ) {
      foreach ( $this->store as $component ) {
         if( class_exists($component) ) {
            if( method_exists(($app = new $component), "install") ) {
               $app->install($this->app);
            }
         }
      }

      $data["type"]        = "admin";
      $data["fullname"]    = "Admin Server";
      $data["shortname"]   = "Admin";
      $data["email"]       = $request->email;
      $data["password"]    = $request->pwd;
      $data["activated"]   = 1;

      (new \Grape\User\Model\Store)->create($data);

      $this->alert->success("Las entidades creadas correctamente");

      return back();
   }

   public function destroy() {

      if( $this->app->count() > 0 ) {
         $app = $this->app;

         $uninstallAndDelete = function($type) use ($app) {
            if( ($data = $this->app->type($type))->count() > 0 ) {
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
