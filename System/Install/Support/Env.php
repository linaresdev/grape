<?php
namespace Grape\Install\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Env {

   protected $app;

   public function __construct( ) {
   }

   public function data() {

      $data["title"] = "Anviente Servidor";
      $data["env"]   = app("files")->get(base_path('.env'));

      return $data;
   }

   public function update( $request ) {

      app("files")->put( base_path('.env'), $request->env );

      $this->alert->success("Archivo de configuracion actualizado corretamente");

      return back();
   }

   public function published(){
      \Artisan::call("vendor:publish", ["--tag" => "install", "--force" => true]);
      return back();
   }
}
