<?php
namespace Grape\User;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Driver {

   public function info() {
     return [
        "name"			   => "User",
        "author"		   => "Ing. Ramón A Linares Febles",
        "email"			=> "rlinares4381@gmail.com",
        "license"		   => "MIT",
        "support"		   => "http://www.iipec.net",
        "version"		   => "V-1.0",
        "description" 	=> "User V-1.0",
     ];
   }
   public function app() {
   	return [
   		"type"			=> "library",
   		"slug"			=> "user",
   		"argument"		=> \Grape\User\Driver::class,
   		"token"			=> NULL,
   		"activated" 	=> 1,
   	];
   }

   ## KERNEL
   public function providers() {
     return [
        \Grape\User\Provider\UserServiceProvider::class,
     ];
   }

   public function alias() {
     return [
        "User" => \Grape\User\Facade\User::class,
     ];
   }

   public function install( $app ) {

      $path = str_replace(base_path(), null, __DIR__."/Database");

      ## REGISTRO DE LA LIBRARERIA
      $app->create($this->app())->addInfo($this->info());

      ## CREANDO LAS ENTIDADES
      \Artisan::call("migrate", ["--path" => $path."/Migration"]);

      ## LANZANDO LOS SEEDER
      \Artisan::call("db:seed", ["--class" => \Grape\User\Database\Seed\Account::class]);
   }

   public function uninstall( $app ) {
      $path = str_replace(base_path(), null, __DIR__."/Database/Migration");

      \Artisan::call("migrate:reset", ["--path" => $path]);
   }
}
